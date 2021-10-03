<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



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

Route::get('/', function () {  
    return view('pages.home');
})->name('home');

Route::get('get_access_token', function () {
    return view('pages.get_access_token');
})->name('get_access_token');

Route::get('register', function () {
    return view('pages.register');
})->name('register');

Route::get('forgot_password', function () {
    return view('pages.forgot_password');
})->name('forgot_password');

Route::get('update_password', [UserController::class, 'update_password'])->name('update_password');




