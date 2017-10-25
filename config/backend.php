<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Backend route prefix
     |--------------------------------------------------------------------------
     |
     | Matches The "/admin/users" URL
     |
     */
    'route_prefix' => 'admin',

    /*
     |--------------------------------------------------------------------------
     | Backend registration
     |--------------------------------------------------------------------------
     |
     | Allows registration
     |
     */
    'allow_registration' => env('BACKEND_ALLOW_REGISTRATION', true),

    /*
     |--------------------------------------------------------------------------
     | Backend User Provider
     |--------------------------------------------------------------------------
     |
     | Sets the backend user model
     |
     */
    'auth' => [
        'providers' => [
            'users' => [
                'model' => \Mschlueter\Backend\Models\User::class,
                'table' => \Mschlueter\Backend\Models\User::class,
            ],
        ],
    ],
];
