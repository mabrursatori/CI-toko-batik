<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->post('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');
$routes->get('/detail/(:any)', 'Home::detail/$1');
$routes->get('/motif/(:any)', 'Home::motif/$1');
$routes->get('/kain/(:any)', 'Home::kain/$1');
$routes->get('/more/(:any)', 'Home::more/$1');
$routes->get('/artikel/(:any)', 'Home::artikel/$1');

$routes->group('admin', function ($routes) {
	$routes->get('/', 'Admin\User::index');
	$routes->get('user/edit/', 'Admin\User::edit/');
	//MOTIF
	$routes->get('motif', 'Admin\Motif::index');
	$routes->get('motif/ajax', 'Admin\Motif::ajax');
	$routes->get('motif/create', 'Admin\Motif::create');
	$routes->post('motif/save', 'Admin\Motif::save');
	$routes->delete('motif/(:num)', 'Admin\Motif::delete/$1');
	$routes->get('motif/edit/(:segment)', 'Admin\Motif::edit/$1');
	$routes->get('motif/ajax', 'Admin\Motif::ajax');
	//KAIN
	$routes->get('kain', 'Admin\Kain::index');
	$routes->get('kain/create', 'Admin\Kain::create');
	$routes->post('kain/save', 'Admin\Kain::save');
	$routes->delete('kain/(:num)', 'Admin\Kain::delete/$1');
	$routes->get('kain/edit/(:segment)', 'Admin\Kain::edit/$1');
	//BATIK
	$routes->get('batik', 'Admin\Batik::index');
	$routes->get('batik/create', 'Admin\Batik::create');
	$routes->post('batik/save', 'Admin\Batik::save');
	$routes->delete('batik/(:num)', 'Admin\Batik::delete/$1');
	$routes->get('batik/edit/(:segment)', 'Admin\Batik::edit/$1');
	$routes->get('/batik/detail/(:any)', 'Admin\Batik::detail/$1');
	//TOKO
	$routes->get('toko', 'Admin\Toko::index');
	$routes->get('toko/create', 'Admin\Toko::create');
	$routes->post('toko/save', 'Admin\Toko::save');
	$routes->delete('toko/(:num)', 'Admin\Toko::delete/$1');
	$routes->get('toko/edit/(:segment)', 'Admin\Toko::edit/$1');
	//GAMBAR
	$routes->get('gambar', 'Admin\Gambar::index');
	$routes->get('gambar/create', 'Admin\Gambar::create');
	$routes->post('gambar/save', 'Admin\Gambar::save');
	$routes->delete('gambar/(:num)', 'Admin\Gambar::delete/$1');
	$routes->get('gambar/edit/(:segment)', 'Admin\Gambar::edit/$1');
	//KAIN
	$routes->get('artikel', 'Admin\Artikel::index');
	$routes->get('artikel/create', 'Admin\Artikel::create');
	$routes->post('artikel/save', 'Admin\Artikel::save');
	$routes->delete('artikel/(:num)', 'Admin\Artikel::delete/$1');
	$routes->get('artikel/edit/(:segment)', 'Admin\Artikel::edit/$1');
});


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
