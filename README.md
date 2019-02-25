# STD Symfony Framework Example - {Notes}

## Project Info

> Here is a list of libraries, tools, extensions, etc. that need to be installed to run the project.

* Symfony 4
  * PHP >= 7.1.3
  * Composer >= 1.5.2
* npm >= 5.5.1
* node >= v6.11.4

## Installation

Go to project's home directory and run:

`composer install`

`cp .env.example .env`

`cp .env.example .env.local`

    Change the DATABASE connection values in the env file

`php bin/console make:migration`

`php bin/console doctrine:migrations:migrate`

`php bin/console server:run`


## Login
 - First of all you have to see the home page: {domain}/
 - After that you will be able to login with the admin:
    - email: admin@admin.com
    - password: admin
