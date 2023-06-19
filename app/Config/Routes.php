<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//validasi
$routes->get('/login', 'LoginUser::index');
$routes->get('/login/user', 'LoginUser::list');
$routes->get('/login/kontraktor', 'LoginKontrak::list');


//admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/situs', 'Admin::judul');

$routes->get('/admin/sosmed', 'Admin::sosmed');
$routes->get('/admin/pelatihan', 'Admin::pelatihan');

//judul & Deskripsi
$routes->post('/admin/situs/add', 'Admin::addjudul');

//Sosial Media
$routes->get('/admin/sosmed/add', 'Admin::addsosmed');
$routes->post('/admin/sosmed/prosesadd', 'Admin::prosesaddsosmed');
$routes->delete('/admin/sosmed/(:num)', 'Admin::deletesosmed/$1');
$routes->get('/admin/sosmed/edit/(:num)', 'Admin::editsosmed/$1');
$routes->post('/admin/sosmed/prosesedit/(:num)', 'Admin::proseseditsosmed/$1');

//faq
$routes->get('/admin/faqs', 'Admin::faq');
$routes->get('/admin/faqs/add', 'Admin::addfaq');
$routes->post('/admin/faqs/prosesadd', 'Admin::prosesaddfaq');
$routes->get('/admin/faqs/edit/(:num)', 'Admin::editfaq/$1');
$routes->post('/admin/faqs/prosesedit/(:num)', 'Admin::proseseditfaq/$1');
$routes->delete('/admin/faqs/(:num)', 'Admin::deletefaq/$1');

// Umum
$routes->get('/', 'Home::index');
$routes->get('/kontraktor', 'Kontraktor::index');

$routes->get('/pekerjaan', 'Pekerjaan::index');
$routes->get('/pekerjaan/detail', 'Pekerjaan::detail');


$routes->get('/faq', 'Faq::index');



// Akun Kontraktor
$routes->get('/mitra', 'AkunKontraktor::index');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
