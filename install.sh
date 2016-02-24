echo "install composer..."

composer self-update
composer install

echo "create .env file..."

cp .env.stage .env

echo "get javascript package for CKEditor and KCFinder"

cd public && git clone git@github.com:thienkimlove/ckeditor.git && cd ckeditor && sh install.sh