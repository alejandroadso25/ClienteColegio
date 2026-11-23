<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController; // Importación del controlador de modulos
use App\Http\Controllers\TeacherController; // Importación del controlador de profesores

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

// Rutas para profesor:
Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index'); // Listar profesores
Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create'); // Ver formulario de creación 
Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store'); // Crear profesor
Route::get('teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit'); // Ver formulario de edicción 
Route::get('teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show'); // Ver profesor especifico
Route::put('teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update'); // Editar profesor
Route::delete('teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy'); // Eliminar profesor