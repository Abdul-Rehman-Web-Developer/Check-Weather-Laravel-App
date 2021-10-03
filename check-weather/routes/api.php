<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\UserController;

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


Route::get('get_countries', [WeatherController::class, 'get_countries'])->name('get_countries');
Route::get('get_cities', [WeatherController::class, 'get_cities'])->name('get_cities');

Route::post('get_user_access_token', [UserController::class, 'get_access_token'])->name('get_user_access_token');
Route::post('register_user', [UserController::class, 'register_user'])->name('register_user');
Route::post('search_weather', [WeatherController::class, 'search_weather'])->name('search_weather');
Route::post('recover_account', [UserController::class, 'recover_account'])->name('recover_account');
Route::post('update_user_password', [UserController::class, 'update_user_password'])->name('update_user_password');
