<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController; // Importación del controlador de modulos

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

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Modulo:
Route::get('modules', [ModuleController::class, 'index'])->name('modules.index'); //Listar modulos