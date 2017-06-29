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
     | Backend route prefix
     |--------------------------------------------------------------------------
     |
     | Matches The "/admin/users" URL
     |
     */
    'allow_registration' => env('BACKEND_ALLOW_REGISTRATION', true),
];
