<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
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
//rutas para el admin - consultorios
Route::get('/admin/consultorios', [ConsultorioController::class, 'index'])
->name('admin.consultorios.index')->middleware(middleware:'auth');
Route::get('/admin/consultorios/create', [ConsultorioController::class, 'create'])
->name('admin.consultorios.create')->middleware(middleware:'auth');
Route::post('/admin/consultorios/create', [ConsultorioController::class, 'store'])
->name('admin.consultorios.store')->middleware(middleware:'auth');
Route::get('/admin/consultorios/{id}', [ConsultorioController::class, 'show'])
->name('admin.consultorios.show')->middleware(middleware:'auth');
Route::get('/admin/consultorios/{id}/edit', [ConsultorioController::class, 'edit'])
->name('admin.consultorios.edit')->middleware(middleware:'auth');
Route::put('/admin/consultorios/{id}', [ConsultorioController::class, 'update'])
->name('admin.consultorios.update')->middleware(middleware:'auth');
Route::get('/admin/consultorios/{id}/confirm-delete', [ConsultorioController::class, 'confirmDelete'])
->name('admin.consultorios.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/consultorios/{id}', [ConsultorioController::class, 'destroy'])
->name('admin.consultorios.destroy')->middleware(middleware:'auth');
//rutas para el admin - doctores
Route::get('/admin/doctores', [DoctorController::class, 'index'])
->name('admin.doctores.index')->middleware(middleware:'auth');
Route::get('/admin/doctores/create', [DoctorController::class, 'create'])
->name('admin.doctores.create')->middleware(middleware:'auth');
Route::post('/admin/doctores/create', [DoctorController::class, 'store'])
->name('admin.doctores.store')->middleware(middleware:'auth');
Route::get('/admin/doctores/{id}', [DoctorController::class, 'show'])
->name('admin.doctores.show')->middleware(middleware:'auth');
Route::get('/admin/doctores/{id}/edit', [DoctorController::class, 'edit'])
->name('admin.doctores.edit')->middleware(middleware:'auth');
Route::put('/admin/doctores/{id}', [DoctorController::class, 'update'])
->name('admin.doctores.update')->middleware(middleware:'auth');
Route::get('/admin/doctores/{id}/confirm-delete', [DoctorController::class, 'confirmDelete'])
->name('admin.doctores.confirmDelete')->middleware(middleware:'auth');
Route::delete('/admin/doctores/{id}', [DoctorController::class, 'destroy'])
->name('admin.doctores.destroy')->middleware(middleware:'auth');