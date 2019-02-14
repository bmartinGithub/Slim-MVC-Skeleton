<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

//$container['csrf']= function($c){
//    return new Slim\Csrf\Guard();
//};

$container['view'] = function ($c) {
    $twigSettings =$c->get('settings')['twig-view'];
    $view = new \Slim\Views\Twig($twigSettings['template_path'] , [
//        'cache' => $twigSettings['cache']['path']

    ]);

    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));
//    $view->addExtension( new App\Extras\CsrfExtension($c->csrf));
    return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//Eloquent
//$container['db'] = function ($container) {
//    $capsule = new \Illuminate\Database\Capsule\Manager;
//    if(!empty($container['settings']['db'])) {
//        $capsule->addConnection($container['settings']['db']);
//
//        $capsule->setAsGlobal();
//        $capsule->bootEloquent();
//    }
//    return $capsule;
//};

//Models
//example
$container['ReviewModel']= function($container){
  return new App\Models\ReviewModel($container);
};

//controllers
//use the namespace in the route and you don't need to list each here.
//example
//$container['HomeController'] = function($c) {
//     // retrieve the 'view' from the container
//    return new App\Controllers\HomeController($c);
//};

//Error Handler
$container['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        return $response->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write("<p>".$exception->getMessage()."</p><br><pre>".print_r($exception,true)."</pre>");
    };
};

$container['csrfErrorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        return $response->withStatus(403)
            ->withHeader('Content-type', 'text/html')
            ->write("<p>".$exception->message."</p><br><pre>".print_r($exception,true)."</pre>");
    };
};