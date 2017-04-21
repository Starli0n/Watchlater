<?php
$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'Watchlater',
            'path' => __DIR__ . '/../logs/app.log',
        ],

        // Watchlater Api settings
        'api' => [
            'jwt_secret' => getenv('JWT_SECRET'),
            'jwt_algorithm' => 'HS256',
            'jwt_applications' => ['Watchlater'] // available applications
        ],
    ],
];
