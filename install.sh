#!/usr/bin/env bash
echo "install composer..."

composer self-update
composer install

echo "create .env file..."

cp .env.stage .env
php artisan key:generate

echo "chmod..."

chmod -R 777 storage
chmod -R 777 bootstrap

echo "get javascript package for CKEditor and KCFinder..."
cd public
mkdir upload
chmod -R 777 upload
mkdir files
chmod -R 777 files
git clone git@github.com:thienkimlove/ckeditor.git
cd ckeditor
sh install.sh




