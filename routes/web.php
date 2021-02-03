<?php

use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$router->get('/', function () {
    return view('welcome');
});

$router->group(['prefix' => 'player'], function () use ($router) {
    $router->get('form', [PlayerController::class, 'form']);
    $router->post('create', [PlayerController::class, 'create']);
});
