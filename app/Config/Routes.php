<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/login', 'Auth\Login::index');
$routes->post('/admin/login', 'Auth\Login::process');
$routes->get('/admin/logout', 'Auth\Login::destroy');
