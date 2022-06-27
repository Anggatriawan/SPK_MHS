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
$routes->setDefaultController('LoginMhs');
$routes->setDefaultMethod('login_mhs');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/hal_awal', 'HalAwal::index');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::proses_login');

$routes->get('/login_mhs', 'LoginMhs::index');
$routes->post('/login_mhs', 'LoginMhs::proses_login_mhs');
$routes->get('/dashboard', 'Home::index');
$routes->get('/dashboard', 'UserMhs::index');


$routes->get('/layout/default', 'Home1::index');
$routes->get('/logout1', 'Home1::logout1');

$routes->get('/logout', 'Home::logout');

$routes->get('/profil_user_mhs', 'Home1::profil_mhs');
$routes->post('/profil_user_mhs', 'Home1::update_profil_mhs');

$routes->get('/profil', 'Home::profil');
$routes->post('/profil', 'Home::update_profil');
$routes->get('/change-password', 'Home::change_password');
$routes->post('/change-password', 'Home::update_password');

/* --------------------------------------------------------------------
 * Alternative Routes
 * ------------------------------------------------------------------ */
$routes->get('/alternative', 'Alternative::index');
$routes->post('/alternative', 'Alternative::simpan');
$routes->post('/alternative/get', 'Alternative::getData');
$routes->post('/alternative/ajax-list', 'Alternative::ajaxList');
$routes->post('/alternative/delete', 'Alternative::delete');
$routes->post('/alternative/(:any)', 'Alternative::update/$1');

/* --------------------------------------------------------------------
 * Kriteria Routes
 * ------------------------------------------------------------------ */
$routes->get('/kriteria', 'Kriteria::index');
$routes->post('/kriteria', 'Kriteria::simpan');
$routes->post('/kriteria/get', 'Kriteria::getData');
$routes->post('/kriteria/ajax-list', 'Kriteria::ajaxList');
$routes->post('/kriteria/delete', 'Kriteria::delete');
$routes->post('/kriteria/(:any)', 'Kriteria::update/$1');

/* --------------------------------------------------------------------
 * Sub Kriteria Routes
 * ----------------------------------------------------------------- */
$routes->get('/sub-kriteria', 'SubKriteria::index');
$routes->post('/sub-kriteria', 'SubKriteria::simpan');
$routes->post('/sub-kriteria/get', 'SubKriteria::getData');
$routes->post('/sub-kriteria/ajax-list', 'SubKriteria::ajaxList');
$routes->post('/sub-kriteria/delete', 'SubKriteria::delete');
$routes->post('/sub-kriteria/(:any)', 'SubKriteria::update/$1');

/* -------------------------------------------------------------------
 * Bobot Routes
 * ---------------------------------------------------------------- */
$routes->get('/bobot', 'Bobot::index');
$routes->post('/bobot', 'Bobot::Simpan');

/* -------------------------------------------------------------------
 * Penilaian Routes
 * ---------------------------------------------------------------- */
$routes->get('/penilaian', 'Penilaian::index');
$routes->post('/penilaian', 'Penilaian::simpan');
$routes->post('/penilaian/get-detail', 'Penilaian::getDetail');
$routes->post('/penilaian/get', 'Penilaian::getData');
$routes->post('/penilaian/delete', 'Penilaian::delete');
$routes->post('/penilaian/(:any)', 'Penilaian::update/$1');

/* -------------------------------------------------------------------
 * Test Routes
 * ---------------------------------------------------------------- */



$routes->get('/profil_mhs', 'ProfilMhs::profil_mhs');
$routes->post('/profil_mhs', 'ProfilMhs::update_profil_mhs');
$routes->get('/change-password', 'ProfilMhs::change_password');
$routes->post('/change-password', 'ProfilMhs::update_password');

$routes->post('/profil_mhs/delete', 'UserMhs::delete');
$routes->get('/profil_mhs/(:any)', 'UserMhs::edit/$1');
$routes->post('/profil_mhs/(:any)', 'UserMhs::update/$1');





/*



$routes->get('/mahasiswa', 'Mahasiswa::index/$1');
$routes->post('/mahasiswa', 'Mahasiswa::simpan');
$routes->post('/mahasiswa/get-detail', 'Mahasiswa::getDetail');
$routes->post('/mahasiswa/ajax-list', 'Mahasiswa::ajaxList');
$routes->post('/mahasiswa/get', 'Mahasiswa::getData');
$routes->post('/mahasiswa/delete', 'Mahasiswa::delete');
$routes->post('/mahasiswa/(:any)', 'Mahasiswa::update');

/* -------------------------------------------------------------------
 * mhs Routes
 * ---------------------------------------------------------------- */

$routes->get('/mhs', 'Mhs::index');
$routes->post('/mhs', 'Mhs::simpan');
$routes->get('/mhs/add', 'Mhs::add');
$routes->get('/mhs/add', 'Mhs::addPenilaian');

$routes->post('/mhs/add', 'Mhs::simpan');
$routes->post('/mhs/get-detail', 'Mhs::getDetail');
$routes->post('/mhs/ajax-list', 'Mhs::ajaxList');
$routes->post('/mhs/get', 'Mhs::getData');
$routes->get('/mhs/(:any)', 'Mhs::edit/$1');
$routes->post('/mhs/delete', 'Mhs::delete');
$routes->post('/mhs/(:any)', 'Mhs::update/$1');



/* -------------------------------------------------------------------
 * Hasil Routes
 * ---------------------------------------------------------------- */
$routes->get('/hasil', 'Hasil::index');
$routes->get('/cetak-hasil', 'Hasil::cetak');

$routes->get('/hasil_mhs', 'HasilMhs::index');
$routes->post('/hasil_mhs/ajax-list', 'HasilMhs::ajaxList');
$routes->post('/hasil_mhs/delete', 'HasilMhs::delete');


/* -------------------------------------------------------------------
 * Manajemen User Routes
 * ---------------------------------------------------------------- */
$routes->get('/user', 'User::index');
$routes->get('/user/add', 'User::add');
$routes->post('/user/add', 'User::simpan');
$routes->post('/user/ajax-list', 'User::ajaxList');
$routes->post('/user/delete', 'User::delete');
$routes->get('/user/(:any)', 'User::edit/$1');
$routes->post('/user/(:any)', 'User::update/$1');

/*
$routes->get('/user_mhs', 'UserMhs::index');
$routes->get('/user_mhs/add', 'UserMhs::add');
$routes->post('/user_mhs/add', 'UserMhs::simpan');
$routes->post('/user_mhs/ajax-list', 'UserMhs::ajaxList');
$routes->post('/user_mhs/delete', 'UserMhs::delete');
$routes->get('/user_mhs/(:any)', 'UserMhs::edit');
$routes->post('/user_mhs/(:any)', 'UserMhs::update');
*/
/*
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
