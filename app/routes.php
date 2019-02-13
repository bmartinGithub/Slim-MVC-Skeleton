<?php

use Slim\Http\Request;
use Slim\Http\Response;

/*************************************/
/********* Routes MVC routes *********/
/*************************************/

//set up to use twig-view
$app->get('/',App\Controllers\HomeController::class.':indexAction')->setName('homePage');
$app->get('/landing/[{name}]',App\Controllers\HomeController::class.':landingAction')->setName('landingPage');


//Original route changed to a post.
$app->post('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info($this->settings['project']['name']." '/' route");
//uses php-view
    // Render index view
        return $this->renderer->render($response, 'index.phtml', $args);
});
