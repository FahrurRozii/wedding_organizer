<?php

namespace Config;

use App\Controllers\Contacts;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
  require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('create-db', function () {
  $forge = \Config\Database::forge();
  if ($forge->createDatabase('wedding_db')) {
    echo 'Database created!';
  }
});

$routes->get('login', 'Auth::login');
$routes->get('register', 'Auth::register');
// $routes->get('/', 'Home::index');
$routes->addRedirect('/', 'Home');
$routes->get('/acara', 'Acara::index');
$routes->get('/acara/add', 'Acara::create');
$routes->post('acara', 'Acara::store');
$routes->get('acara/edit/(:num)', 'Acara::edit/$1');
$routes->put('acara/(:any)', 'Acara::update/$1');
$routes->delete('acara/(:segment)', 'Acara::destroy/$1');
$routes->get('/groups/trash', 'Groups::trash');
$routes->get('/groups/restore/(:any)', 'Groups::restore/$1');
$routes->get('/groups/restore', 'Groups::restore');
$routes->delete('/groups/deleted/(:any)', 'Groups::deleted/$1');
$routes->delete('/groups/deleted', 'Groups::deleted');
$routes->presenter('groups');
$routes->get('contacts/export', 'Contacts::export');
$routes->post('contacts/import', 'Contacts::import', ['filter' => 'isLogged']);
$routes->resource('contacts');

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
