<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth','redirect']);

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/produk', 'ProdukController::index', ['filter' => 'auth']);
$routes->get('/keranjang', 'TransaksiController::index', ['filter' => 'auth']);
$routes->get('/keranjang', 'TransaksiController::index', ['filter' => 'auth']);
$routes->post('/keranjang', 'TransaksiController::cart_add', ['filter' => 'auth']);
$routes->post('/keranjang/edit', 'TransaksiController::cart_edit', ['filter' => 'auth']);
$routes->get('/keranjang/delete/(:any)', 'TransaksiController::cart_delete/$1', ['filter' => 'auth']);
$routes->get('/keranjang/clear', 'TransaksiController::cart_clear', ['filter' => 'auth']);

$routes->get('/kategoriproduk', 'KategoriProdukController::index', ['filter' => 'auth']);

$routes->post('/produk', 'ProdukController::create', ['filter' => 'auth']);
$routes->post('/produk/edit/(:any)', 'ProdukController::edit/$1', ['filter' => 'auth']);
$routes->get('/produk/delete/(:any)', 'ProdukController::delete/$1', ['filter' => 'auth']);
$routes->get('/produk/download', 'ProdukController::download', ['filter' => 'auth']);

$routes->post('/kategoriproduk', 'KategoriProdukController::create', ['filter' => 'auth']);
$routes->post('/kategoriproduk/edit/(:any)', 'KategoriProdukController::edit/$1', ['filter' => 'auth']);
$routes->get('/kategoriproduk/delete/(:any)', 'KategoriProdukController::delete/$1', ['filter' => 'auth']);

$routes->get('profile', 'Home::profile', ['filter' => 'auth']);
$routes->get('/faq', 'FaqController::index', ['filter' => 'auth']);
$routes->get('/redirect', 'RedirectController::index', ['filter' => 'auth']);
$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);


$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);
$routes->resource('api', ['controller' => 'apiController']);

$routes->group('/diskon', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'DiskonController::index');
    $routes->post('/', 'DiskonController::create');
    $routes->post('edit/(:any)', 'DiskonController::edit/$1');
    $routes->get('delete/(:any)', 'DiskonController::delete/$1');
});