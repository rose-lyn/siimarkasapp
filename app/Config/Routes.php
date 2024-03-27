<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\AuthController;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'AuthController::register');
$routes->get('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->add('/register/save', 'AuthController::RegisterSave');
$routes->add('/login/enter', 'AuthController::LoginAction');
$routes->add('/dashboard', 'AdminController::index');
$routes->get('/error', function(){
    echo view('templates/admin/header');
    echo view('error');
    echo view('templates/admin/footer');
});

