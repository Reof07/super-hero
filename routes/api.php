<?php

use App\Http\Controllers\Api\V1\PublicherController;
use App\Http\Controllers\Api\V1\RegisterController;
use App\Http\Controllers\Api\V1\SuperHeroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function ($router) {
    $router->apiresource('super-heros', SuperHeroController::class);
    $router->apiresource('publishers', PublicherController::class);
});
