<?php

/**
 * Front Controller
 * PHP version 8.2.1
 */


/**
 * Routing
 */
require_once(__DIR__ . '/../vendor/autoload.php');

use Core\Router;
use Dotenv\Dotenv;

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('\Core\Error::errorHandler');
set_exception_handler('\Core\Error::exceptionHandler');

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new Router();

// All the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);