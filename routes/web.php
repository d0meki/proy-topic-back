<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Cache\Lock;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth', [LoginController::class, 'login'])->name('auth.login');

Route::get('/map', [MapaController::class, 'getMapa'])->name('map.getmapa');
Route::get('/mapa2', [MapaController::class, 'getMapaDos'])->name('map.getmapados');
Route::get('/mapa3', [MapaController::class, 'getMapaTres'])->name('map.getmapatres');
Route::get('/funcionarios', [FuncionarioController::class, 'getfuncionario'])->name('funcionarios.getfuncionario');
Route::get('/bandeja', [ReclamoController::class, 'getBandeja'])->name('bandeja.getBandeja');
Route::get('/area', [AreaController::class, 'getArea'])->name('area.getArea');
Route::get('/categoria', [CategoriaController::class, 'getCategoria'])->name('categoria.getCategoria');
Route::get('/estado', [EstadoController::class, 'getEstado'])->name('estado.getEstado');


// Route::get('/map', function () {
//     return view('map');
// });
// Route::get('/mapa2', function () {
//     return view('mapa2');
// });
// Route::get('/mapa3', function () {
//     return view('mapa3');
// });
