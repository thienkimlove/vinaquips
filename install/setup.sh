#!/usr/bin/env bash

cd ..
echo "install composer..."

sudo composer self-update
composer install

echo "create .env file..."
cp .env.stage .env
read -e -p "Your MySQL Host : " -i "localhost" mysql_host
read  -e -p "Your MySQL Database : " -i "homestead" mysql_db
read  -e -p "Your MySQL Username : " -i "root" mysql_user
read -e -p "Your MySQL Password : " -i "secret" mysql_pass

sed -i "s/*.DB_HOST.*/DB_HOST=$mysql_host/g" .env
sed -i "s/*.DB_DATABASE.*/DB_DATABASE=$mysql_db/g" .env
sed -i "s/*.DB_USERNAME.*/DB_USERNAME=$mysql_user/g" .env
sed -i "s/*.DB_PASSWORD.*/DB_PASSWORD=$mysql_pass/g" .env
php artisan key:generate

mysql -u$mysql_user -p$mysql_pass -h$mysql_host -e "GRANT USAGE ON *.* TO '$mysql_db'@'localhost' IDENTIFIED BY '$mysql_user' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;CREATE DATABASE IF NOT EXISTS $mysql_db;GRANT ALL PRIVILEGES ON $mysql_db.* TO '$mysql_user'@'localhost';"

php artisan migrate
chmod -R 777 storage
chmod -R 777 bootstrap
php artisan ide-helper:generate
[ ! -d public/upload ] || mkdir public/upload
[ ! -d public/files ] || mkdir public/files

chmod -R 777 public/upload
chmod -R 777 public/files

cd public && bower install && git clone git@github.com:sunhater/kcfinder.git
sed -i  "s/'disabled' => true/'disabled' => false/g" kcfinder/conf/config.php
sed -i  's/"upload"/"\/upload"/g' kcfinder/conf/config.php
cd ..

cp -r install/markdown public/bower_components/ckeditor/plugins/
cp -rf install/config.js public/bower_components/ckeditor/config.js



