<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/level', [LevelController::class, 'index'])->name('/level');

Route::get('/kategori', [KategoriController::class, 'index'])->name('/kategori');

Route::get('/user', [UserController::class, 'index'])->name('/user');

Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');

Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');

Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('/user/ubah');

Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');

Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('/user/hapus');

Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');

Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('/kategori/edit');

Route::put('/kategori/simpen/{id}', [KategoriController::class, 'simpen'])->name('/kategori/simpen');

Route::post('/kategori', [KategoriController::class, 'store'])->name('/kategori');

Route::get('/kategori/delete/{id}', [KategoriController::class, 'busek'])->name('/kategori/delete');

Route::get('/user/create', [UserController::class, 'create'])->name('/user/create');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('/user/edit');

Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');

Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('/level/edit');

Route::resource('m_user', POSController::class);

Route::get('/', [WelcomeController::class, 'index']);