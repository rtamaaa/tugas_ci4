<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  get
$routes->get('/', 'Home::index');
$routes->get('/dosen', 'Dosen::index');

//action
$routes->post('dosen/tambah', 'Dosen::tambah'); 
$routes->get('/dosen/update/(:num)', 'Dosen::update/$1');
$routes->post('/dosen/update/(:num)', 'Dosen::update/$1');
$routes->get('/dosen/delete/(:num)', 'Dosen::delete/$1');
