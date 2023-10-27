<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('testme', 'Home::testme');
$routes->get('autoapi', 'Auto::index');
