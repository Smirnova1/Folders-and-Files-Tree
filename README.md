# Folders-and-Files-Tree

The Folders-and-Files-Tree is realized on Laravel 6 and MySQL with using JSTree jQuery plugin.
 
## Introduction
The project accepts an input string that contains the path to a folder. 
At the output, we get a tree view of folders and files with their nesting.

## Official Documentation
Documentation for the framework can be found on the [Laravel documentation](https://laravel.com/)

## How to use:
###### For appropriate work of the program you need:

1. Create an empty Database `CREATE DATABASE yourdatabasename`
2. Run: `git clone https://github.com/Smirnova1/Folders-and-Files-Tree.git` 
    * Go to Folders-and-Files-Tree `cd Folders-and-Files-Tree`
3. Generate .env file `cp .env.example .env` (for Linux and MAC) `copy .env.example .env` (for Windows)
4. Run the commands `composer install`
5. Fill .env file:
    * `APP_KEY=` <p>for key generation `php artisan key:generate`</p>
    * Database:
     ```
        DB_DATABASE=yourdatabasename
        DB_USERNAME=yourusername
        DB_PASSWORD=yourpassword
      ```
6. Run the command  `php artisan migrate` to complete the database with tables.

###### Use the command `php artisan serve` to start Folders-and-Files-Tree on the local host.

