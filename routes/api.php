<?php

use App\Http\Controllers\TokenController;
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

Route::get('token', [TokenController::class, 'index'])->name('token');

Route::get('positions', [\App\Http\Controllers\PositionController::class, 'index'])
    ->name('positions.index');

Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index');
Route::get('users/{user}', [\App\Http\Controllers\UserController::class, 'show'])
    ->whereNumber('user')
    ->name('users.show');
Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])
    ->middleware('accessRegister')->name('users.store');
