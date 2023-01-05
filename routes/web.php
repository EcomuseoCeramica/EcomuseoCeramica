<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductClientController;
use App\Http\Controllers\ProductoArtesanalController;
use App\Http\Controllers\ProductoGastronomicoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\CharlaController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\InformacionController;

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

Route::get('/nosotros', function () {
    return view('Nosotros');
});
Route::resource('users', UsersController::class);
Route::resource('personas', PersonaController::class);
Route::resource('products', ProductController::class);
Route::resource('servicess', ServiceController::class);
Route::resource('galerias', GaleriaController::class);
Route::resource('tour', TourController::class);
Route::resource('talleres', TallerController::class);
Route::resource('reserva', ReservaController::class);
Route::resource('charlas', CharlaController::class);
Route::resource('/', ProductClientController::class);
Route::resource('formularios', FormularioController::class);
Route::resource('productos', ProductosController::class);
Route::resource('informacion', InformacionController::class);