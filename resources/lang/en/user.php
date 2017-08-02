<?php

return [

    'index' => [

        'title' => 'Users',

        'name' => 'Name',

        'email' => 'E-Mail Address',

        'active' => 'Active',

        'role' => 'Role',

        'roles' => [
            \Mschlueter\Backend\Models\Role::SUPER_ADMIN => 'Superadmin',
            \Mschlueter\Backend\Models\Role::ADMIN => 'Admin',
            \Mschlueter\Backend\Models\Role::EDITOR => 'Editor',
        ],

        'last_login' => 'Last Login',

        'button' => [
            'add' => 'Add User',
            'edit' => 'Edit',
            'delete' => 'Delete',
        ],

    ],

    'create' => [

        'title' => 'Add User',

        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
        ],

        'email' => [
            'label' => 'E-Mail Address',
            'placeholder' => 'E-Mail Address',
        ],

        'button' => 'Add',

    ],

    'edit' => [

        'title' => 'Edit User',

        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
        ],

        'email' => [
            'label' => 'E-Mail Address',
            'placeholder' => 'E-Mail Address',
        ],

        'button' => 'Save',

    ],

    'destroy' => [

        'title' => 'Delete User',

        'text' => 'Are you sure you want to delete the user :name (:email)?',

        'button' => [
            'yes' => 'Yes',
            'no' => 'No',
        ],

    ],

];
