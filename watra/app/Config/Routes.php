<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda::index');
$routes->get('/detail', 'Detail::index');
$routes->get('/cart', 'Cart::index');
$routes->get('/checkout', 'Checkout::index');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/kategori', 'Kategori::index');
$routes->add('/kategori/add', 'Kategori::tambah');
$routes->add('/kategori/(:segment)/edit', 'Kategori::edit/$1');
$routes->get('/kategori/(:segment)/delete', 'Kategori::delete/$1');

$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->get('/register', 'Register::index');
$routes->add('/register/simpan', 'Register::simpan');
