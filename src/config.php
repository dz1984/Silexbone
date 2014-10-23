<?php

$app['debug'] = true;

$database_config = [
    'db.options' => 
        [
        'driver'   => 'pdo_pgsql',
        'user'  => 'YOUR_USERNAME',
        'password' => 'YOUR_PASSWORD',
        'dbname' => 'YOUR_DBNAME'
        ]
];

$template_config = [
    'twig.path' => __DIR__.'/views'
];