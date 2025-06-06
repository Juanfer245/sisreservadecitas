<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretariaController;
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

//rutas para el admin - secretarias
Route::get('/admin/secretarias', [SecretariaController::class, 'index'])
->name('admin.secretarias.index')->middleware(middleware:'auth');
Route::get('/admin/secretarias/create', [SecretariaController::class, 'create'])
->name('admin.secretarias.create')->middleware(middleware:'auth');
Route::post('/admin/secretarias/create', [SecretariaController::class, 'store'])
->name('admin.secretarias.store')->middleware(middleware:'auth');
Route::get('/admin/secretarias/{id}', [SecretariaController::class, 'show'])
->name('admin.secretarias.show')->middleware(middleware:'auth');
Route::get('/admin/secretarias/{id}/edit', [SecretariaController::class, 'edit'])
->name('admin.secretarias.edit')->middleware(middleware:'auth');
Route::put('/admin/secretarias/{id}', [SecretariaController::class, 'update'])
->name('admin.secretarias.update')->middleware(middleware:'auth');
Route::get('/admin/secretarias/{id}/confirm-delete', [SecretariaController::class, 'confirmDelete'])
->name('admin.secretarias.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/secretarias/{id}', [SecretariaController::class, 'destroy'])
->name('admin.secretarias.destroy')->middleware(middleware:'auth');
//rutas para el admin - pacientes
Route::get('/admin/pacientes', [PacienteController::class, 'index'])
->name('admin.pacientes.index')->middleware(middleware:'auth');
Route::get('/admin/pacientes/create', [PacienteController::class, 'create'])
->name('admin.pacientes.create')->middleware(middleware:'auth');
Route::post('/admin/pacientes/create', [PacienteController::class, 'store'])
->name('admin.pacientes.store')->middleware(middleware:'auth');
Route::get('/admin/pacientes/{id}', [PacienteController::class, 'show'])
->name('admin.pacientes.show')->middleware(middleware:'auth');
Route::get('/admin/pacientes/{id}/edit', [PacienteController::class, 'edit'])
->name('admin.pacientes.edit')->middleware(middleware:'auth');
Route::put('/admin/pacientes/{id}', [PacienteController::class, 'update'])
->name('admin.pacientes.update')->middleware(middleware:'auth');
Route::get('/admin/pacientes/{id}/confirm-delete', [PacienteController::class, 'confirmDelete'])
->name('admin.pacientes.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/pacientes/{id}', [PacienteController::class, 'destroy'])
->name('admin.pacientes.destroy')->middleware(middleware:'auth');