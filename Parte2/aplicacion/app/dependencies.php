<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
  $settings = $c->get('settings');
  $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

  // Add extensions
  $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
  $view->addExtension(new Twig_Extension_Debug());

  // Add session logged_in to twig global
  //  $view->getEnvironment()->addGlobal('user', isset ($_SESSION["user"]) ? $_SESSION["user"] : array() );

  return $view;
};

// Flash messages
$container['flash'] = function ($c) {
  return new \Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
  $settings = $c->get('settings');
  $logger = new Monolog\Logger($settings['logger']['name']);
  $logger->pushProcessor(new Monolog\Processor\UidProcessor());
  $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
  return $logger;
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

// Set Base Controller
$container['App\Action\Controller'] = function ($c) { 
  return new App\Action\Controller($c);
};

$container['App\Action\Home'] = function ($c) {
  return new App\Action\Home($c);
};

$container['App\Action\SimpleCRUD'] = function ($c) {
  return new App\Action\SimpleCRUD($c);
};
