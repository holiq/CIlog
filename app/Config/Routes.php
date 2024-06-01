<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin/post', 'Admin\Post::index');
$routes->get('/admin/post/create', 'Admin\Post::create');
$routes->post('/admin/post/store', 'Admin\Post::store');
$routes->get('/admin/post/edit/(:num)', 'Admin\Post::edit/$1');
$routes->post('/admin/post/update/(:num)', 'Admin\Post::update/$1');
$routes->get('/admin/post/delete/(:num)', 'Admin\Post::destroy/$1');
