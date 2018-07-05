#  AAC-server 
Develop with Laravel 5.2 (require PHP 5.5.9)

## Deploy AAC-server
> PHP environment and Composer is require
```
$ composer install
$ cp .env.example .env
$ php artisan k:g
$ php artisan migrate
```
> You must set .env file with database info before `$ php artisan migrate`