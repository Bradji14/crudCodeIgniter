<?php

use CodeIgniter\Router\RouteCollection;
// use CodeIgniter\App\Controllers\ProductController;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Product::index');
$routes->post('store', 'Product::store');
$routes->get('edit/(:num)', 'Product::edit/$1');
$routes->post('update', 'Product::update');
$routes->get('delete/(:num)', 'Product::delete/$1');
