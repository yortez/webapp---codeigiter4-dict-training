<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('login', 'user::login', ['filter' => 'NoAuth']);
$routes->post('login', 'user::login');
$routes->get('logout', 'user::logout');


$routes->get('/', 'Home::index', ['filter' => 'Auth']);

$routes->get('user', 'user::index', ['filter' => 'Auth']);
$routes->get('student', 'student::index');


$routes->get('user/add','user::add', ['filter' => 'Auth']);
$routes->post('user/add','user::add');
$routes->get('user/edit','user::edit', ['filter' => 'Auth']);
$routes->post('user/edit','user::edit');


$routes->get('student/add','student::add', ['filter' => 'Auth']);
$routes->post('student/add','student::add');

$routes->get('student/edit','student::edit', ['filter' => 'Auth']);
$routes->post('student/edit','student::edit');

$routes->get('user/delete','user::delete', ['filter' => 'Auth']);
$routes->post('user/delete','user::delete');

$routes->get('student/delete','student::delete', ['filter' => 'Auth']);
$routes->post('student/delete','student::delete');


