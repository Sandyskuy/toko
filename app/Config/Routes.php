<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Tambahkan rute untuk controller Login
$routes->group('/login', function ($routes) {
    $routes->get('/', 'Login::index');
    $routes->post('auth', 'Login::auth'); // Tambahkan rute untuk POST /login/auth
    $routes->get('logout', 'Login::logout');
});
// Tambahkan rute untuk controller Admin (contoh saja)
$routes->group('/admin', function ($routes) {
    $routes->get('/', 'Admin::index'); // Gunakan alias "auth" di sini
});


$routes->group('/barang', function ($routes) {
    $routes->get('/', 'Barang::index');
    $routes->post('tambah', 'Barang::tambah');
    $routes->post('hapus', 'Barang::hapus');
    $routes->get('edit/(:segment)', 'Barang::edit/$1'); // Menampilkan form edit barang
    $routes->post('update', 'Barang::update'); // Menyimpan perubahan data barang
});

$routes->group('/user', function ($routes) {
    $routes->get('/', 'User::index');
    $routes->post('tambah', 'User::tambah');
    $routes->post('hapus', 'User::hapus');
});

$routes->group('/transaksi', function ($routes) {
    $routes->get('/', 'Transaksi::index');
    $routes->get('create', 'Transaksi::create'); // Menampilkan form tambah transaksi
    $routes->post('store', 'Transaksi::store'); // Menyimpan data transaksi baru
    $routes->get('edit/(:segment)', 'Transaksi::edit/$1'); // Menampilkan form edit transaksi
    $routes->post('update/(:segment)', 'Transaksi::update/$1'); // Menyimpan perubahan data transaksi
    $routes->get('delete/(:segment)', 'Transaksi::delete/$1'); // Menghapus transaksi
});

