<?php
$config = [
    'settings' => [
        'project'=>[
            'name'=>'MySlimMVCProject',
            'version'=>'0.1',
            'mode'=>'development'
            ],
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        'db' => [
//            'driver' => 'mysql',
//            'host' => 'localhost',
//            'database' => 'slim_cms',
//            'username' => 'slim_usr',
//            'password' => '',
//            'charset'   => 'utf8',
//            'collation' => 'utf8_unicode_ci',
//            'prefix'    => 'slim_',
        ],
        // Renderer settings
        //php-view
        'renderer' => [
            'template_path' => __DIR__ . '/views/',
        ],
        //twig view
        'twig-view'=>[
            'template_path'=> __DIR__ . '/views/',
            'layouts'=>__DIR__ . '/views/layouts/',
            'cache'=>[
                'path'=>dirname(__DIR__).'/cache/',
                'debug'=>false
            ]
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => (isset($config['project']['mode'])&& $config['project']['mode']=='development')? 'php://stdout' : dirname(__DIR__) . '/logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
return $config;