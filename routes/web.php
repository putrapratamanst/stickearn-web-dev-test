<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ScramblerController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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
Auth::routes();
$router->get('logout', [LoginController::class, 'logout']);

$router->get('/', function () {
    return view('welcome');
});
$router->get('home', [HomeController::class, 'index']);

$router->group(['prefix' => 'player'], function () use ($router) {
    $router->get('form', [PlayerController::class, 'form']);
    $router->post('create', [PlayerController::class, 'create']);
});

$router->group(['prefix' => 'scrambler'], function () use ($router) {
    $router->get('playground', [ScramblerController::class, 'playground']);
    $router->get('generate', [ScramblerController::class, 'generate']);
    $router->post('check', [ScramblerController::class, 'check']);
});

$router->group(['prefix' => 'score'], function () use ($router) {
    $router->get('get', [ScoreController::class, 'getScore']);
    $router->get('delete', [ScoreController::class, 'delete']);
});

$router->group(['prefix' => 'result'], function () use ($router) {
    $router->get('history', [ResultController::class, 'history']);
    $router->get('admin/history/{playerId}', [ResultController::class, 'historyInAdmin']);
});
