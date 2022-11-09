# Blog app
A blog built with laravel 8

# SETUP

before you run the app localy, you need to do some steps first

## .env file
- copy whats in .env.example into another file and name it with this command `cp .env.example .env`
- generate a key for your app with `php artisan key:generate`
- set up your configuration in .env file

## Database Setup

- create a local database on MySQL software or use phpMyAdmin (__make sure your database name is the same as in .env file.__)
- to set the app to your database port put assign database port number (default 3306) to `DB_PORT` in .env file 
- compelete .env file with your right configuration and add it to your root directory





## now you are ready to run the app

- ### `composer install`
- ### `npm install`

- Migrations

    - after setting up your database and installing run `php artisan migrate` to create needed tables
- serve appliction with `php artisan serve`
