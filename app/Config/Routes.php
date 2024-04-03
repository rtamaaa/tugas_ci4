<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  get
$routes->get('/', 'Home::index');
$routes->get('/dosen', 'Dosen::index');
$routes->get('/login', 'Login::index', ['as' => 'login']);
$routes->get('/register', 'register::index', ['as' => 'register']);
$routes->get('/logout', 'Login::logout');
//action
$routes->post('dosen/tambah', 'Dosen::tambah'); 
// $routes->get('/dosen/update/(:num)', 'Dosen::update/$1');
// $routes->post('/dosen/update/(:num)', 'Dosen::update/$1');
// $routes->get('/dosen/delete/(:num)', 'Dosen::delete/$1');

//login
$routes->post('login/process', 'Login::process' );
$routes->post('register/process', 'register::process' );
$routes->post('logout/process', 'Logout::process' );
