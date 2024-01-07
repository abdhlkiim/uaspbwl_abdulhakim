<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROUTE USER
Route::get('/user', [UserController::class, 'index']);

// ROUTE KATEGORI
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori/store', [KategoriController::class, 'store']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::patch('/kategori/edit/{id}', [KategoriController::class, 'update']);
Route::get('/kategori/delete/{id}', [KategoriController::class, 'destroy']);

// ROUTE PRODUK
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk/store', [ProdukController::class, 'store']);
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
Route::patch('/produk/edit/{id}', [ProdukController::class, 'update']);
Route::get('/{produk}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);
