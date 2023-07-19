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
$routes->get('/mylogin', 'LoginUser::index');
$routes->post('/mylogin/auth', 'Admin::loginAuth');
//$routes->post('/save', 'Admin::insert');
//$routes->get('/login', 'LoginUser::index');
$routes->get('/login/kontraktor', 'LoginKontrak::list');


//admin
$routes->get('/admin', 'Admin::index',['filter' => 'authGuard']);
$routes->get('/admin/situs', 'Admin::judul',['filter' => 'authGuard']);
$routes->get('/bom', 'Admin::bom');

$routes->get('/admin/sosmed', 'Admin::sosmed',['filter' => 'authGuard']);


//judul & Deskripsi
$routes->post('/admin/situs/add', 'Admin::addjudul',['filter' => 'authGuard']);

//Sosial Media
$routes->get('/admin/sosmed/add', 'Admin::addsosmed',['filter' => 'authGuard']);
$routes->post('/admin/sosmed/prosesadd', 'Admin::prosesaddsosmed',['filter' => 'authGuard']);
$routes->delete('/admin/sosmed/(:num)', 'Admin::deletesosmed/$1',['filter' => 'authGuard']);
$routes->get('/admin/sosmed/edit/(:num)', 'Admin::editsosmed/$1',['filter' => 'authGuard']);
$routes->post('/admin/sosmed/prosesedit/(:num)', 'Admin::proseseditsosmed/$1',['filter' => 'authGuard']);

//faq
$routes->get('/admin/faqs', 'Admin::faq',['filter' => 'authGuard']);
$routes->get('/admin/faqs/add', 'Admin::addfaq',['filter' => 'authGuard']);
$routes->post('/admin/faqs/prosesadd', 'Admin::prosesaddfaq',['filter' => 'authGuard']);
$routes->get('/admin/faqs/edit/(:num)', 'Admin::editfaq/$1',['filter' => 'authGuard']);
$routes->post('/admin/faqs/prosesedit/(:num)', 'Admin::proseseditfaq/$1',['filter' => 'authGuard']);
$routes->delete('/admin/faqs/(:num)', 'Admin::deletefaq/$1',['filter' => 'authGuard']);

//pelatihan
$routes->get('/pelatihan/(:segment)', 'Pelatihan::detailPelatihan/$1');
$routes->get('/pelatihan', 'Pelatihan::blog');
$routes->get('/pelatihan/cek/cart', 'Pelatihan::cekCart');
$routes->get('/pelatihan/cek/clear', 'Pelatihan::clear');
$routes->post('/pelatihan/add/daftar', 'Pelatihan::addCart');
$routes->post('/pelatihan/payment', 'Pelatihan::payment');
$routes->post('/pelatihan/prosespayment', 'Pelatihan::payment2');
$routes->get('/cart', 'Pelatihan::cart');

//cart
$routes->post('/pelatihan/add/daftar', 'Pelatihan::addCart');
$routes->delete('/cart/delete/(:any)', 'Pelatihan::delCart/$1');
$routes->get('/admin/pelatihan', 'Admin::pelatihan',['filter' => 'authGuard']);
$routes->get('/admin/pelatihan/add', 'Admin::addpelatihan',['filter' => 'authGuard']);
$routes->post('/admin/pelatihan/add/save', 'Admin::prosesaddpelatihan',['filter' => 'authGuard']);




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
