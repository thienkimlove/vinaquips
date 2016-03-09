#!/usr/bin/env bash

echo "Start setup..."

cp .env.stage .env
read -p "Your MySQL Host : "  mysql_host
read -p "Your MySQL Database : "  mysql_db
read  -p "Your MySQL Username : " mysql_user
read -p "Your MySQL Password : " mysql_pass

sed -i -e "s/localhost/$mysql_host/g" .env
sed -i -e "s/homestead/$mysql_db/g" .env
sed -i -e "s/root/$mysql_user/g" .env
sed -i -e "s/secret/$mysql_pass/g" .env

mysql -u$mysql_user -p$mysql_pass -h$mysql_host -e "GRANT USAGE ON *.* TO '$mysql_db'@'localhost' IDENTIFIED BY '$mysql_user' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;CREATE DATABASE IF NOT EXISTS $mysql_db;GRANT ALL PRIVILEGES ON $mysql_db.* TO '$mysql_user'@'localhost';"

composer install

php artisan key:generate
php artisan migrate
php artisan ide-helper:generate

chmod -R 777 storage
chmod -R 777 bootstrap


[ -d public/upload ] || mkdir public/upload
[ -d public/files ] || mkdir public/files
chmod -R 777 public/upload
chmod -R 777 public/files

cd public && bower install && [ -d kcfinder ] || git clone git@github.com:sunhater/kcfinder.git
sed -i  "s/'disabled' => true/'disabled' => false/g" kcfinder/conf/config.php
sed -i  's/"upload"/"\/upload"/g' kcfinder/conf/config.php
[ -d bower_components/ckeditor/plugins/pbckcode ] || git clone git@github.com:prbaron/pbckcode.git bower_components/ckeditor/plugins/pbckcode

cat > bower_components/ckeditor/config.js  <<'endmsg'
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.filebrowserBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=flash';
	//do not add extra paragraph to html
	config.autoParagraph = false;

	config.toolbarGroups = [
		{"name":"basicstyles","groups":["basicstyles"]},
		{"name":"links","groups":["links"]},
		{"name":"paragraph","groups":["list","blocks"]},
		{"name":"document","groups":["mode"]},
		{"name":"insert","groups":["insert"]},
		{"name":"styles","groups":["styles"]},
		{"name":"about","groups":["about"]},
		{ name: 'pbckcode', "groups":["pbckcode"]}
	];

	config.extraPlugins = 'pbckcode';
};
endmsg




