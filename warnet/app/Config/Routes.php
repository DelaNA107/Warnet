<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda::index');
$routes->get('/detail', 'Detail::index');
// $routes->get('/cart', 'Cart::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/kategori', 'Kategori::index');
$routes->add('/kategori/add', 'Kategori::tambah');
$routes->add('/kategori/(:segment)/edit', 'Kategori::edit/$1');
$routes->get('/kategori/(:segment)/delete', 'Kategori::delete/$1');
// $routes->get('/paket', 'Paket::index');
// $routes->add('/paket/add', 'Paket::tambah');
// $routes->add('/paket/(:segment)/edit', 'Paket::edit/$1');
// $routes->get('/paket/(:segment)/delete', 'Paket::delete/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');
$routes->add('/register/simpan', 'Register::simpan');
$routes->add('/kategoripaket', 'KategoriPaket::index');
$routes->add('/kategoripaket/(:segment)/view', 'KategoriPaket::view/$1');
$routes->get('/staff', 'Staff::index');
$routes->add('/staff/add', 'Staff::tambah');
$routes->add('/staff/(:segment)/edit', 'Staff::edit/$1');
$routes->get('/staff/(:segment)/delete', 'Staff::delete/$1');
$routes->get('/member', 'Member::index');
$routes->add('/member/add', 'Member::tambah');
$routes->add('/member/(:segment)/edit', 'Member::edit/$1');
$routes->get('/member/(:segment)/delete', 'Member::delete/$1');
// $routes->get('/cart', 'Cart::index');
// $routes->add('/cartAdd', 'Cart::tambahCart');
// $routes->get('/cart/(:segment)/delete', 'Cart::delete/$1');
// $routes->add('/checkout', 'Cart::checkout');
// $routes->add('/cart/(:segment)/finishTrans', 'Cart::finishTrans/$1');
$routes->get('/register', 'Register::index');
$routes->post('/register/simpan', 'Register::simpan');
$routes->get('/komputer', 'Komputer::index');
$routes->post('/komputer/store', 'Komputer::store');
$routes->post('/komputer/update/(:num)', 'Komputer::update/$1');
$routes->post('/komputer/delete/(:num)', 'Komputer::delete/$1');
$routes->post('cart/add', 'CartController::addToCart');
$routes->get('/paket', 'PaketController::index');
$routes->post('/paket/store', 'PaketController::store');
$routes->post('/paket/update', 'PaketController::update');
$routes->post('/paket/delete/(:num)', 'PaketController::delete/$1');
$routes->get('cart', 'CartController::viewCart');
$routes->get('cart/remove/(:num)', 'CartController::removeItem/$1');
$routes->post('cart/checkout', 'CartController::checkout');
// Routes.php
$routes->get('/transaksi', 'Transaksi::index');
$routes->post('/transaksi/store', 'Transaksi::store');
$routes->post('/transaksi/update', 'Transaksi::update');
$routes->post('/transaksi/delete/(:num)', 'Transaksi::delete/$1');
