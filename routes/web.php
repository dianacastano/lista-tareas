<?php

use App\Http\Controllers\TareaController;
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

Route::get('/', [TareaController::class, 'index'])->name('tareas.index');
Route::get('/crear', [TareaController::class, 'create'])->name('tareas.create');
Route::post('/guardar', [TareaController::class, 'store'])->name('tareas.store');
Route::post('/completar/{index}', [TareaController::class, 'complete'])->name('tareas.complete');
Route::delete('/eliminar/{index}', [TareaController::class, 'destroy'])->name('tareas.destroy');

