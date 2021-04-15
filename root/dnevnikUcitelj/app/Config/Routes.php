<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
//$routes->get('/login.php', 'Home::index');
//
//
// (?i) -> case insensitive


//$route['default_controller'] = 'Login/index';






// odjava uporabnika
$routes->get('(?i)odjava', 'domov::odjava');



// preusmeritev uporabnika, ki ni prijavljen
$routes->get('(?i)Home', 'Home::index', ['filter' => 'auth']);

$routes->get('(?i)Vnos', 'Vnos::index', ['filter' => 'auth']);
$routes->get('(?i)Vnos', '(?i)Vnos::vnosZapiska', ['filter' => 'auth']);




$routes->get('(?i)izpisZapiskov', 'IzpisZapiskov_razred::index', ['filter' => 'auth']);
$routes->get('(?i)izpisZapiskov', 'IzpisZapiskov_moji::index', ['filter' => 'auth']);

$routes->get('(?i)izpisDijakov', 'izpisDijakov::index', ['filter' => 'auth']);

$routes->get('(?i)izpisGrafOcen', 'izpisGrafOcen::index', ['filter' => 'auth']);

$routes->get('(?)test', 'test::index', ['filter' => 'auth']);


// preusmeritev uporabnika, ki ni admin
$routes->get('(?i)administracija', 'Administracija::index', ['filter' => 'authadmin']);

$routes->get('(?i)urejanjeUporabnika', 'urejanjeUporabnika::index', ['filter' => 'authadmin']);



// preusmeritev uporabnika, ki je prijavljen
$routes->get('(?i)login', 'Login::index', ['filter' => 'noauth']);
$routes->get('(?i)login/registriran', 'Login::registriran', ['filter' => 'noauth']);






/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
