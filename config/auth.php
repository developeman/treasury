<?php
 return [

        'multi' => [
            'admin' => [
                'driver' => 'eloquent',
                'model' => 'App\Admins',
                'table' => 'admins',
            ],
            'client' => [
                'driver' => 'eloquent',
                'model' => 'App\Clients',
                'table' => 'clients',
                'email' => 'client.emails.password',
            ]
        ],

        'password' => [
                'email' => 'emails.password',
                'table' => 'password_resets',
                'expire' => 60,
            ],

    ];