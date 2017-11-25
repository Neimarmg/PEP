<?php
return [
    'driver' => env('MAIL_DRIVER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

    'port' => env('MAIL_PORT', 587),

    'from' => [
        'address' => 'diretoria.pep@gmail.com',
        'name' => 'diretoria.pep',
        // 'address' => env('MAIL_FROM_ADDRESS', 'ramprofissional@gmail.com'),
        // 'name' => env('MAIL_FROM_NAME', 'ramprofissional'),
    ],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'pretend' => false,

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
];
