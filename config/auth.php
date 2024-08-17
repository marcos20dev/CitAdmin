<?php


return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'soporte' => [ // Guard para soporte
            'driver' => 'session',
            'provider' => 'soportes', // Asegúrate de que el nombre del provider coincida
        ],

        'doctor' => [ // Guard para doctor
            'driver' => 'session',
            'provider' => 'doctors',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Administrador::class,
        ],
        'soportes' => [ // Provider para soporte
            'driver' => 'eloquent',
            'model' => App\Models\Soporte::class,
        ],

        'doctors' => [ // Provider para doctor
            'driver' => 'eloquent',
            'model' => App\Models\Doctor::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'admin_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'soportes' => [
            'provider' => 'soportes',
            'table' => 'support_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
