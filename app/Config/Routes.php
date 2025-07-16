<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('user', 'user::index');
$routes->get('student', 'student::index');


$routes->get('user/add','user::add');
$routes->POST('user/add','user::add');

$routes->get('student/add','student::add');
$routes->POST('student/add','student::add');