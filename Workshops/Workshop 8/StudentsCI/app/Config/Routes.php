<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Student::index');
$routes->get('/students', 'Student::index');
$routes->get('/students/create', 'Student::create');
$routes->post('/students/save', 'Student::save');
$routes->get('/students/edit/(:num)', 'Student::edit/$1');
$routes->get('/students/delete/(:num)', 'Student::delete/$1');

$routes->get('/careers/index', 'Career::index');
$routes->get('/careers/create', 'Career::create');
$routes->get('/careers/save', 'Career::save');
$routes->get('/careers/edit/(:num)', 'Career::edit/$1');
$routes->get('/careers/delete/(:num)', 'Career::delete/$1');