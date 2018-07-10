# Laravel Command Create User

Laravel command for rapid creating an user with default table

## Installation

You can use composer to install the package

`composer require spacedog4/ccreateuser`

Next add the `Spacedog4\Command\UserCreaterCommand` class to your console kernel

````
   // app/Console/Kernel.php
   
   protected $commands = [
       ...
       \Spacedog4\Command\UserCreaterCommand::class,
   ]
````

## Requirements
This command just works with the default users table from laravel, it must have:
- an User Model `app/User`
- a Laravel users table with the columns `name`, `email` and `password`

## Usage

This command will create an user

`php artisan user-create {name} {email} {password}`

**Where...**

`name` is the user's name<br/>
`email` is user's email<br/>
`password` is user's password, it will be encrypted by Laravel Hash

