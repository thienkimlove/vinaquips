echo "install composer..."

composer self-update
composer install

echo "create .env file..."

cp .env.stage .env

echo "chmod..."

chmod -R 777 storage
chmod -R 777 bootstrap

echo "get javascript package for CKEditor and KCFinder..."

chmod -R 777 upload
cd public
mkdir upload
git clone git@github.com:thienkimlove/ckeditor.git
cd ckeditor
sh install.sh
cd ..
cd ..
