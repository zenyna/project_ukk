<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//user
$routes->get('logout', 'User::logout');
$routes->post('Cek', 'User::Ceklogin');
$routes->get('/', 'User::index');
$routes->get('dashboard','Dashboard::index');
$routes->get('user', 'User::user');
$routes->post('user/simpan', 'User::simpan');
$routes->get('user/edit/(:any)', 'User::edit/$1');
$routes->post('user/update', 'User::update');
$routes->get('user/hapus/(:any)', 'User::hapus/$1');

//kategori
$routes->get('kategori', 'Kategori::index');
$routes->post('kategori/simpan', 'Kategori::simpan');
$routes->get('kategori/hapus/(:any)', 'Kategori::hapus/$1');

//menu
$routes->get('menu', 'Menu::index');
$routes->post('menu/simpan', 'Menu::simpan');
$routes->get('menu/edit/(:any)', 'Menu::edit/$1');
$routes->post('menu/update', 'Menu::update');
$routes->get('menu/hapus/(:any)', "Menu::hapus/$1");

//penjualan
//$routes->get('penjualan', 'Penjualan::index');
//$routes->get('cek', 'Penjualan::cek');
//$routes->post('add', 'Penjualan::add');
//$routes->get('clear', 'Penjualan::clear');
//$routes->get('cart', 'Penjualan::cart');
//$routes->get('penjualan/update', 'Penjualan::update');
//$routes->get('contoh', 'Penjualan::contoh');

//order
$routes->get('order', 'Order::index');
$routes->post('ceko', 'Order::CekMenu');
$routes->post('add', 'Order::add');
$routes->get('view', 'Order::ViewCart');
$routes->post('pembayaran', 'Order::bayar');


//Laporan
//$routes->get('laporan/harian', 'Laporan::LaporanHarian');
//$routes->post('view/laporan/harian', 'Laporan::LaporanHarian');

//$routes->get('laporan/bulanan', 'Laporan::LaporanBulanan');
//$routes->post('view/laporan/bulanan', 'Laporan::ViewLaporanBulanan');




$routes->get('laporan/harian', 'Laporan::LaporanHarian');
$routes->post('tabel/laporan/harian', 'Laporan::ViewTabelLaporan');


