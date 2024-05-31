<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/login', 'Auth\Login::index');
$routes->post('/admin/login', 'Auth\Login::process');
$routes->get('/admin/logout', 'Auth\Login::destroy');

$routes->get('/admin', 'Admin\Dashboard::index');

$routes->get('/admin/category', 'Admin\Category::index');
$routes->get('/admin/category/create', 'Admin\Category::create');
$routes->post('/admin/category/store', 'Admin\Category::store');
$routes->get('/admin/category/edit/(:num)', 'Admin\Category::edit/$1');
$routes->post('/admin/category/update/(:num)', 'Admin\Category::update/$1');
$routes->get('/admin/category/delete/(:num)', 'Admin\Category::destroy/$1');