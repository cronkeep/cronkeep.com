<?php

require '../vendor/autoload.php';

$app = new \Slim\Slim(array(
    'templates.path' => '../application/views',
    'debug' => false
));

// Initialize layout system
$view = new \library\App\Layout();
$view->setTemplatesDirectory($app->config('templates.path'));
$app->view($view);

$app->get('/', function () use ($app) {
    $app->render('index.phtml');
});

$app->get('/demo', function () use ($app) {
    $app->render('demo.phtml');
});

$app->run();
