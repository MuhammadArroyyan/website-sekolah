<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('taruna/(:num)', 'Taruna::detail/$1');
$routes->post('discipline/store', 'Discipline::store');
$routes->post('tahfidz/store', 'Tahfidz::store');
$routes->get('/pasukan', 'Pasukan::index');