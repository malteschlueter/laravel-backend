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
     | Backend registration
     |--------------------------------------------------------------------------
     |
     | Activates user after registration
     |
     */
    'activate_user_after_registration' => env('BACKEND_ACTIVATE_USER_AFTER_REGISTRATION', false),

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
