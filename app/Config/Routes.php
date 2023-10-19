<?php

use App\Controllers\Crud\AuthController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', function () {
    return redirect()->to('/post');
});


// auth
$routes->get('/login', [AuthController::class, 'login_page'], ['filter' => 'verified']);
$routes->get('/register', [AuthController::class, 'register_page'], ['filter' => 'verified']);
$routes->post('/login', [AuthController::class, 'signin'], ['as' => 'auth.signin']);
$routes->post('/register', [AuthController::class, 'register'], ['as' => 'auth.register']);
$routes->post('/logout', [AuthController::class, 'logout'], ['as' => 'auth.logout']);




$routes->group('/', function (RouteCollection $routes) {
    // contoh resource controller yg valid
    $routes->resource('post', [
        'controller' => '\App\Controllers\Crud\PostController',
        // 'placeholder' => 'name'
        // 'as' => 'post.route'

    ]);

    $routes->resource('category', [
        'controller' => '\App\Controllers\Crud\CategoryController',
        'filter' => 'guest',
    ]);

    $routes->resource('author', [
        'controller' => '\App\Controllers\Crud\AuthorController',
        'filter' => 'guest',
    ]);
});
