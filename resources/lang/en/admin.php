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

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'deleted' => 'Deleted',
            'post_name' => 'Post name',
            
        ],
    ],

    'city' => [
        'title' => 'Cities',

        'actions' => [
            'index' => 'Cities',
            'create' => 'New City',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'city_name' => 'City name',
            'deleted' => 'Deleted',
            
        ],
    ],

    'office' => [
        'title' => 'Offices',

        'actions' => [
            'index' => 'Offices',
            'create' => 'New Office',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'address' => 'Address',
            'city_id' => 'City',
            'deleted' => 'Deleted',
            'phone' => 'Phone',
            
        ],
    ],

    'route' => [
        'title' => 'Routes',

        'actions' => [
            'index' => 'Routes',
            'create' => 'New Route',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'arrival_city_id' => 'Arrival city',
            'deleted' => 'Deleted',
            'departure_city_id' => 'Departure city',
            'distance' => 'Distance',
            'user_id' => 'User',
            
        ],
    ],

    'model' => [
        'title' => 'Models',

        'actions' => [
            'index' => 'Models',
            'create' => 'New Model',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'deleted' => 'Deleted',
            'model_name' => 'Model name',
            
        ],
    ],

    'transport' => [
        'title' => 'Transports',

        'actions' => [
            'index' => 'Transports',
            'create' => 'New Transport',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'car_number' => 'Car number',
            'deleted' => 'Deleted',
            'model_id' => 'Model',
            'total_seats' => 'Total seats',
            
        ],
    ],

    'schedule' => [
        'title' => 'Schedules',

        'actions' => [
            'index' => 'Schedules',
            'create' => 'New Schedule',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'confirmed' => 'Confirmed',
            'cost' => 'Cost',
            'date' => 'Date',
            'deleted' => 'Deleted',
            'route_id' => 'Route',
            'time' => 'Time',
            'transport_id' => 'Transport',
            
        ],
    ],

    'passenger' => [
        'title' => 'Passengers',

        'actions' => [
            'index' => 'Passengers',
            'create' => 'New Passenger',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'deleted' => 'Deleted',
            'first_name' => 'First name',
            'passport_number' => 'Passport number',
            'passport_series' => 'Passport series',
            'phone' => 'Phone',
            'second_name' => 'Second name',
            'surname' => 'Surname',
            
        ],
    ],

    'ticket' => [
        'title' => 'Tickets',

        'actions' => [
            'index' => 'Tickets',
            'create' => 'New Ticket',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'deleted' => 'Deleted',
            'passenger_id' => 'Passenger',
            'schedule_id' => 'Schedule',
            
        ],
    ],

    'post-user' => [
        'title' => 'Post Users',

        'actions' => [
            'index' => 'Post Users',
            'create' => 'New Post User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'deleted' => 'Deleted',
            'post_id' => 'Post',
            'user_id' => 'User',
            
        ],
    ],

    'office-user' => [
        'title' => 'Office Users',

        'actions' => [
            'index' => 'Office Users',
            'create' => 'New Office User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'deleted' => 'Deleted',
            'office_id' => 'Office',
            'user_id' => 'User',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];