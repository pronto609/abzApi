<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('positions', [\App\Http\Controllers\PositionController::class, 'index'])
    ->name('positions.index');

Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index');
Route::get('users/{user}', [\App\Http\Controllers\UserController::class, 'show'])
    ->whereNumber('user')
    ->name('users.show');
Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])
    ->middleware('accessRegister')->name('users.store');
