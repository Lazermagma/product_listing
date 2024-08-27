<?php

use App\Controllers\testController;
use App\Router;

$router = new Router();


$router->get('/', testController::class, 'test');
$router->get('/add-product', testController::class, 'addProduct');
$router->post('/add-product', testController::class, 'testAdd');

$router->post('/delete-products', testController::class, 'deleteProducts');

try {
    $router->dispatch();
} catch (Exception $e) {

}

