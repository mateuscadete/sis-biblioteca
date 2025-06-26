<?php

return [

  'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users', // usado pelo Jetstream
    ],

    'usuario' => [
        'driver' => 'session',
        'provider' => 'usuarios', // usado pelo seu sistema de usuário comum
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => env('AUTH_MODEL', App\Models\User::class),
    ],

    'usuarios' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
],


    

];
