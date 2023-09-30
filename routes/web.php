<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\CiudadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PaisController::class, 'index'])->name('index');
Route::post('/api_departamento/{id}', [DepartamentoController::class, 'api_departamento'])->name('api_departamento');
Route::post('/api_ciudad/{id}', [CiudadController::class, 'api_ciudad'])->name('api_ciudad');
Route::post('/api_mapa/{id}', [CiudadController::class, 'api_mapa'])->name('api_mapa');


