<?php
return [
  'settings' => [
    // Slim Settings
    'determineRouteBeforeAppMiddleware' => false,
    'displayErrorDetails' => true,

    // View settings
    'view' => [
        'template_path' => __DIR__ . '/templates',
        'twig' => [
          'cache' => __DIR__ . '/../cache/twig',
          'debug' => true,
          'auto_reload' => true,
        ],
    ],

    // monolog settings
    'logger' => [
        'name' => 'app',
        'path' => __DIR__ . '/../log/app.log',
    ],

    // db settings
    'db' => [
      'dbuser' => 'user',
      'dbpassword' => 'password', 
      'dbname' => 'dbname',
      'dbhost' => 'localhost'
    ],

    // Google recaptcha Key settings
    'recaptcha' => [
      'siteKey' => '6LeDiRATAAAAAAb7duvCPWPhxIwOOHx8d3i8enHZ',
      'secretKey' => '6LeDiRATAAAAABp4iURemasv11xC_EoCx6iXBNRR',
    ],

  ],
];
