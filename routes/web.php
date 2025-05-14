<?php

use Illuminate\Support\Facades\Route;

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
    return view('/admin/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');


//Rutas para el CRUD de Categorías
Route::get('admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('admin.categorias.index')->middleware('auth');
Route::get('admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('admin.categorias.create')->middleware('auth');
Route::post('admin/categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('admin.categorias.store')->middleware('auth');
Route::get('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('admin.categorias.show')->middleware('auth');
Route::get('admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('admin.categorias.edit')->middleware('auth');
Route::put('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('admin.categorias.update')->middleware('auth');
Route::delete('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('admin.categorias.destroy')->middleware('auth');

//Rutas para el CRUD de Marcas
Route::get('admin/marcas', [App\Http\Controllers\MarcaController::class, 'index'])->name('admin.marcas.index')->middleware('auth');
Route::get('admin/marcas/create', [App\Http\Controllers\MarcaController::class, 'create'])->name('admin.marcas.create')->middleware('auth');
Route::post('admin/marcas', [App\Http\Controllers\MarcaController::class, 'store'])->name('admin.marcas.store')->middleware('auth');
Route::get('admin/marcas/{id}', [App\Http\Controllers\MarcaController::class, 'show'])->name('admin.marcas.show')->middleware('auth');
Route::get('admin/marcas/{id}/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('admin.marcas.edit')->middleware('auth');
Route::put('admin/marcas/{id}', [App\Http\Controllers\MarcaController::class, 'update'])->name('admin.marcas.update')->middleware('auth');
Route::delete('admin/marcas/{id}', [App\Http\Controllers\MarcaController::class, 'destroy'])->name('admin.marcas.destroy')->middleware('auth');

