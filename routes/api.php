<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\ReclamoController;
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

Route::post('/registrar_reclamo', [ReclamoController::class, 'store'])->name('reclamo.store');
Route::post('/uploadPhoto', [FotoController::class, 'store'])->name('foto.store');
Route::get('/ejemplo', [ReclamoController::class, 'ejemplo'])->name('reclamo.ejemplo');
Route::post('/user_register', [RegisterController::class, 'register'])->name('user.register');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

