<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth; // 👈 Importación necesaria
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
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//rutas para el admin
Route::get('/admin', [AdminController::class, 'index'])
->name('admin.index')->middleware(middleware:'auth');
//rutas para el admin-usuario
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])
->name('admin.usuarios.index')->middleware(middleware:'auth');
//ruta para crear
Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])
->name('admin.usuarios.create')->middleware(middleware:'auth');
Route::post('/admin/usuarios/create', [UsuarioController::class, 'store'])
->name('admin.usuarios.store')->middleware(middleware:'auth');
Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'show'])
->name('admin.usuarios.show')->middleware(middleware:'auth');
Route::get('/admin/usuarios/{id}/edit', [UsuarioController::class, 'edit'])
->name('admin.usuarios.edit')->middleware(middleware:'auth');
Route::put('/admin/usuarios/{id}', [UsuarioController::class, 'update'])
->name('admin.usuarios.update')->middleware(middleware:'auth');
Route::get('/admin/usuarios/{id}/confirm-delete', [UsuarioController::class, 'confirmDelete'])
->name('admin.usuarios.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])
->name('admin.usuarios.destroy')->middleware(middleware:'auth');