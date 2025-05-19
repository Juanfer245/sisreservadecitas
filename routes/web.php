<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // 👈 Importación necesaria
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
