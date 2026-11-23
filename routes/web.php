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
Route::get('modules', [ModuleController::class, 'index'])->name('modules.index'); // Listar modulos
Route::get('modules/create', [ModuleController::class, 'create'])->name('modules.create'); // Ver formulario de creación 
Route::post('modules', [ModuleController::class, 'store'])->name('modules.store'); // Crear módulo
Route::get('modules/{id}/edit', [ModuleController::class, 'edit'])->name('modules.edit'); // Ver formulario de edicción 
Route::get('modules/{id}', [ModuleController::class, 'show'])->name('modules.show'); // Ver módulo especifico
Route::put('modules/{id}', [ModuleController::class, 'update'])->name('modules.update'); // Editar módulo
Route::delete('modules/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy'); // Eliminar módulo