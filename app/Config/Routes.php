<?php

use App\Controllers\Crud\AuthController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// auth
$routes->get('/login', [AuthController::class, 'login']);
$routes->post('/login', [AuthController::class, 'signin'], ['as' => 'login.signin']);



// contoh resource controller yg valid
$routes->resource('/post', [
    'controller' => '\App\Controllers\Crud\PostController',
    // 'placeholder' => 'name'
    // 'as' => 'post.route'

]);

$routes->resource('/category', [
    'controller' => '\App\Controllers\Crud\CategoryController',
]);

$routes->resource('/author', [
    'controller' => '\App\Controllers\Crud\AuthorController',
]);
