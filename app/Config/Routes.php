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

$routes->get('/admin/comment', 'Admin\Comment::index');
$routes->get('/admin/comment/create', 'Admin\Comment::create');
$routes->post('/admin/comment/store', 'Admin\Comment::store');
$routes->get('/admin/comment/edit/(:num)', 'Admin\Comment::edit/$1');
$routes->post('/admin/comment/update/(:num)', 'Admin\Comment::update/$1');
$routes->get('/admin/comment/delete/(:num)', 'Admin\Comment::destroy/$1');

$routes->get('/admin/category', 'Admin\Category::index');
$routes->get('/admin/category/create', 'Admin\Category::create');
$routes->post('/admin/category/store', 'Admin\Category::store');
$routes->get('/admin/category/edit/(:num)', 'Admin\Category::edit/$1');
$routes->post('/admin/category/update/(:num)', 'Admin\Category::update/$1');
$routes->get('/admin/category/delete/(:num)', 'Admin\Category::destroy/$1');

