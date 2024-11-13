<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda::index');
$routes->get('/detail', 'Detail::index');
$routes->get('/cart', 'Cart::index');
$routes->get('/checkout', 'Checkout::index');
