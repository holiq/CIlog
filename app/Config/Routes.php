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


$routes->get('/admin/post', 'Admin\Post::index');
$routes->get('/admin/post/create', 'Admin\Post::create');
$routes->post('/admin/post/store', 'Admin\Post::store');
$routes->get('/admin/post/edit/(:num)', 'Admin\Post::edit/$1');
$routes->post('/admin/post/update/(:num)', 'Admin\Post::update/$1');
$routes->get('/admin/post/delete/(:num)', 'Admin\Post::destroy/$1');


$routes->get('/admin/user', 'Admin\User::index');
$routes->get('/admin/user/create', 'Admin\User::create');
$routes->post('/admin/user/store', 'Admin\User::store');
$routes->get('/admin/user/edit/(:num)', 'Admin\User::edit/$1');
$routes->post('/admin/user/update/(:num)', 'Admin\User::update/$1');
$routes->get('/admin/user/delete/(:num)', 'Admin\User::destroy/$1');
