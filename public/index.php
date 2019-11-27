<?php

/**
 * Front controller
 *
 * PHP version 7.2
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
// $router->add('{controller}/{action}');
$router->add('', ['controller' => 'ItemController', 'action' => 'index']);
$router->add('AddItem', ['controller' => 'ItemController', 'action' => 'addItem']); 
$router->add('SaveItem', ['controller' => 'ItemController', 'action' => 'saveItem']); 
$router->add('ItemList', ['controller' => 'ItemController', 'action' => 'itemList']); 
$router->add('SearchItems', ['controller' => 'ItemController', 'action' => 'searchItems']); 
$router->dispatch($_SERVER['QUERY_STRING']);
