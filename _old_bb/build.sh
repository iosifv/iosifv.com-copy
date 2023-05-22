#!/usr/bin/env sh

C_YELLOW=$(tput setaf 3)
C_RESET=$(tput sgr0)

print_status() {
  echo "${C_YELLOW} => ${1}${C_RESET}";
}

print_status "Cleaning up the environment"
cp .env .env.bck
cp .env.mysql .env
rm -rf vendor/
rm -rf node_modules/

print_status "artisan key:generate"
php artisan key:generate

print_status "artisan storage:link"
php artisan storage:link

print_status "Creating a new mysql user"
sudo mysql -u root -e "CREATE USER 'laravel'@'localhost' IDENTIFIED WITH mysql_native_password `''`; GRANT ALL PRIVILEGES ON * . * TO 'laravel'@'localhost'; FLUSH PRIVILEGES;"

print_status "Creating a new database"
mysql -u laravel -e "CREATE DATABASE iosifv; SHOW DATABASES; select host, user from mysql.user;"

print_status "Installing dependencies"
composer install --quiet
export NVM_DIR="$HOME/.nvm"
nvm install 10
nvm use 10
npm install
npm run dev

print_status "Laravel Migrations"
php artisan migrate:install
php artisan migrate

print_status "Install Voyager"
php artisan voyager:install

print_status "Create Voyager Admin user (hi@iosifv.com)"
php artisan voyager:admin hi@iosifv.com --create


print_status "Granting permissions to /public directory"
chmod +rwx storage/app/public/


print_status "Laravel Seeders"
php artisan db:seed

print_status "Quotes Seeders"
php artisan quotes:seed
echo ''

print_status "Photo Seeders... Well, still in progress"
