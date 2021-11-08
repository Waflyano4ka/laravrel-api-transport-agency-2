<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'api_token' => 'Api token',
            'birthday' => 'Birthday',
            'deleted' => 'Deleted',
            'dismissed' => 'Dismissed',
            'email' => 'Email',
            'first_name' => 'First name',
            'inn' => 'Inn',
            'passport_number' => 'Passport number',
            'passport_series' => 'Passport series',
            'password' => 'Password',
            'scan' => 'Scan',
            'second_name' => 'Second name',
            'surname' => 'Surname',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];