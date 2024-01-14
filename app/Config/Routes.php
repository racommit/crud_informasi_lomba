<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Data Mahasiswa
$routes->get('data-mahasiswa', 'MahasiswaController::data');
$routes->get('dashboard', 'MahasiswaController::dd');
$routes->post('edit', 'MahasiswaController::edit');
$routes->post('tambah', 'MahasiswaController::tambah');
$routes->post('/delete', 'MahasiswaController::delete');
// Data Mahasiswa

// Now
$routes->get('now', 'LombaController::dd2');
$routes->post('deleteLomba', 'LombaController::delete');
$routes->post('tambahLomba', 'LombaController::tambahlomba');
$routes->post('editLomba', 'LombaController::editlomba');
// Now

// Coming Soon
$routes->get('coming-soon', 'LombaController::comingsoon2');
// Coming Soon

$routes->get('home', 'Home::home');

// Login
// $routes->get('login', 'Home::login');
// Login

// Register
// $routes->get('register', 'Home::register');
// Register

// Informasi User
$routes->get('InfoUser', 'UserController::index', ['filter' => 'role:administrator']);
$routes->post('/users/activate', 'UserController::activate');
$routes->post('users/setPassword', 'UserController::setPassword');
$routes->post('/users/changeGroup', 'UserController::changeGroup');
$routes->post('/users/save', 'UserController::save');

// 404
$routes->get('/404', 'Home::forbidden');
$routes->get('welcome_message', 'Home::welcome');
