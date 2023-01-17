<?php

use App\Http\Controllers\CitasController;
use Illuminate\Support\Facades\Auth;
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
    return view('citas.index');
});

Auth::routes();

Route::get('/citas', [CitasController::class, 'index']);
Route::post('/citas/mostrar', [CitasController::class, 'show']);
Route::post('/citas/guardar', [CitasController::class, 'store']);
Route::post('/citas/editar/{id}', [CitasController::class, 'edit']);
Route::post('/citas/actualizar/{citas}', [CitasController::class, 'update']);
Route::post('citas/borrar/{id}', [CitasController::class, 'destroy']);



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
