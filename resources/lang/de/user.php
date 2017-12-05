<?php

return [

    'index' => [

        'title' => 'Benutzer',

        'name' => 'Name',

        'email' => 'E-Mail Adresse',

        'active' => 'Aktiv',

        'role' => 'Rolle',

        'roles' => [
            \Mschlueter\Backend\Models\Role::SUPER_ADMIN => 'Superadmin',
            \Mschlueter\Backend\Models\Role::ADMIN => 'Admin',
            \Mschlueter\Backend\Models\Role::USER => 'User',
        ],

        'last_login' => 'Letzte Anmeldung',

        'button' => [
            'add' => 'Benutzer hinzufügen',
            'edit' => 'Bearbeiten',
            'delete' => 'Löschen',
        ],

    ],

    'create' => [

        'title' => 'Benutzer hinzufügen',

        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
        ],

        'email' => [
            'label' => 'E-Mail Adresse',
            'placeholder' => 'E-Mail Adresse',
        ],

        'role' => [
            'label' => 'Rolle',
        ],

        'roles' => [
            \Mschlueter\Backend\Models\Role::SUPER_ADMIN => 'Superadmin',
            \Mschlueter\Backend\Models\Role::ADMIN => 'Admin',
            \Mschlueter\Backend\Models\Role::USER => 'User',
        ],

        'button' => 'Hinzufügen',

    ],

    'edit' => [

        'title' => 'Benutzer ändern',

        'name' => [
            'label' => 'Name',
            'placeholder' => 'Name',
        ],

        'email' => [
            'label' => 'E-Mail Adresse',
            'placeholder' => 'E-Mail Adresse',
        ],

        'active' => [
            'label' => 'Aktiv',
        ],

        'role' => [
            'label' => 'Rolle',
        ],

        'roles' => [
            \Mschlueter\Backend\Models\Role::SUPER_ADMIN => 'Superadmin',
            \Mschlueter\Backend\Models\Role::ADMIN => 'Admin',
            \Mschlueter\Backend\Models\Role::USER => 'User',
        ],

        'change-password' => 'Passwort ändern',

        'button' => 'Speichern',

    ],

    'destroy' => [

        'title' => 'Benutzer löschen',

        'text' => 'Möchten Sie wirklich den Benutzer :name (:email) löschen?',

        'button' => [
            'yes' => 'Ja',
            'no' => 'Nein',
        ],

    ],

];
