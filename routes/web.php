<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ScramblerController;
use App\Http\Controllers\ScoreController;

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

$router->group(['prefix' => 'scrambler'], function () use ($router) {
    $router->get('playground', [ScramblerController::class, 'playground']);
    $router->get('generate', [ScramblerController::class, 'generate']);
    $router->post('check', [ScramblerController::class, 'check']);
});

$router->get('/score/get', [ScoreController::class, 'getScore']);
