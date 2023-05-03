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

use App\Controllers\User;
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'User::index');
$routes->get(
    '/',
    'Dashboard::index'
);
$routes->get(
    '/dashboard',
    'Dashboard::index'
);

$routes->add(
    '/admin',
    'Admin:index'
);
$routes->get(
    '/admin',
    'Admin::index',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/admin/index',
    'Admin::index',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/admin/role',
    'Role::index',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/admin/access/(:num)',
    'Role::access/$1',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/admin/(:num)',
    'Admin::detail/$1',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/admin/employee',
    'Employee::index',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/admin/add_user',
    'User::add_user',
    ['filter' => 'role:Admin']
);
$routes->post(
    '/admin/index',
    'User::save',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/menu/menu',
    'Menu::index',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/menu/addmenu',
    'Menu::add_menu',
    ['filter' => 'role:Admin']
);
$routes->get(
    'Menu/delete/(:num)',
    'Menu::delete/$1',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/employee/(:num)',
    'Employee::detail/$1',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/absensi',
    'Absensi::index'
);
$routes->get(
    '/absensi/rekap',
    'Absensi::rekap'
);
$routes->get(
    '/templates/404',
    'Payroll::index',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/user',
    'User::index'
);
$routes->get(
    '/user/add_user',
    'User::add_user',
    ['filter' => 'role:Admin']
);
$routes->get(
    'User/delete/(:num)',
    'User::delete/$1',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/admin/detail_employee',
    'Employee::detail',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/admin/add_employee',
    'Employee::add_employee',
    ['filter' => 'role:Admin']
);
$routes->get(
    'Employee/delete/(:num)',
    'Employee::delete/$1',
    ['filter' => 'role:Admin']
);
$routes->get(
    'Employee/edit_employee/(:num)',
    'Employee::update/$1',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/data_master/divisi',
    'Datamaster::divisi',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/data_master/position',
    'Datamaster::position',
    ['filter' => 'role:Admin']
);
$routes->get(
    '/data_master/add_position',
    'Datamaster::add_position',
    ['filter' => 'role:Admin']
);


$routes->post(
    '/data_master/add_position',
    'Datamaster::add_position',
    ['filter' => 'role:Admin']
);
$routes->post(
    '/admin/index',
    'User::add_user',
    ['filter' => 'role:Admin']
);
$routes->post(
    'employee/edit_employee/(:num)',
    'Employee::update/$1',
    ['filter' => 'role:Admin']
);
$routes->post(
    '/employee/add_employee',
    'Employee::add_employee',
    ['filter' => 'role:Admin']
);
$routes->post(
    '/user/add_user',
    'User::add_user',
    ['filter' => 'role:Admin']
);
$routes->post(
    '/menu/addmenu',
    'Menu::add_menu',
    ['filter' => 'role:Admin']
);
$routes->post(
    'change-access',
    'Role::changeaccess',
    ['filter' => 'role:Admin']
);
$routes->post(
    'index/absensi',
    'Absensi::index',
);





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
