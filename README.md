mschlueter/laravel-backend
================

## Installation

Run in terminal:
`composer require mschlueter/laravel-backend:master-dev`


### Laravel 5.* Integration

Add the service provider to your `config/app.php` file:

```php

    'providers'     => array(

        //...
        Mschlueter\Backend\ServiceProvider::class,

    ),

```

run in terminal:
`php artisan migrate`

#### User Generation ####

To create a new user. You can run the command:
`php artisan backend:create-user`
