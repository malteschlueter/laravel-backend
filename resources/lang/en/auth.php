<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'login' => [
        'title' => 'Login',
        'email' => 'E-Mail Address',
        'password' => 'Password',
        'remember_me' => 'Remember Me',
        'button' => 'Login',
        'forgot_password' => 'Forgot Your Password?',
    ],

    'register' => [
        'title' => 'Register',
        'name' => 'Name',
        'email' => 'E-Mail Address',
        'password' => 'Password',
        'password_confirm' => 'Confirm Password',
        'button' => 'Register',
    ],

    'passwords' => [
        'email' => [
            'title' => 'Reset Password',
            'text' => 'Enter your email address that you used to register. We\'ll send you an email with a link to reset your password.',
            'email' => 'E-Mail Address',
            'button' => 'Send',
        ],
        'reset' => [
            'title' => 'Reset Password',
            'email' => 'E-Mail Address',
            'password' => 'Password',
            'password_confirm' => 'Confirm Password',
            'button' => 'Reset Password',
        ],
        'change' => [
            'title' => 'Change Password',
            'old-password' => 'Old Password',
            'new-password' => 'New Password',
            'new-password_confirm' => 'Confirm Password',
            'button' => 'Change Password',
            'messages' => [
                'success' => 'Your password has been changed.',
            ],
        ],
    ],

];
