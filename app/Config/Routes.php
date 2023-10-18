<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

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
