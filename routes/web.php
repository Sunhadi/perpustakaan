<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentPermController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RentFinishController;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/home', [HomeController::class, 'index']);
Route::get('/book-detail/{id}', [HomeController::class, 'show']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::put('/user-update', [UserController::class, 'profileUpdate']);
    Route::delete('/delete-user', [UserController::class, 'deleteUser']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'check']);
});

Route::middleware(['auth', 'only-peminjam'])->group(function () {

    Route::get('/pinjam-buku/{id}', [PeminjamanController::class, 'pinjam']);
    Route::get('/daftar-pinjam', [UserController::class, 'listPinjam']);

    // Koleksi Pribadi
    Route::get('/koleksi', [UserController::class, 'koleksi']);
    Route::get('/simpan-koleksi/{id}', [UserController::class, 'simpanKoleksi']);
    Route::delete('/hapus-koleksi', [UserController::class, 'destroy']);

    Route::post('simpan-ulasan', [BookController::class, 'ulasan']);
});

Route::middleware(['auth','only-admin'])->group(function () {

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user-tambah', [UserController::class, 'create']);
    Route::get('/user-acc/{id}', [UserController::class, 'acc']);
    Route::get('/user-down/{id}', [UserController::class, 'down']);
});

Route::middleware(['auth', 'admin-petugas'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Mengatur Category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category-tambah', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit']);
    Route::put('/category-update', [CategoryController::class, 'update']);
    Route::delete('/category-hapus', [CategoryController::class, 'destroy']);


    // Mengatur Buku
    Route::get('/buku', [BookController::class, 'index']);
    Route::get('/buku-tambah', [BookController::class, 'create']);
    Route::post('/buku', [BookController::class, 'store']);
    Route::get('/buku-edit/{id}', [BookController::class, 'edit']);
    Route::put('/buku-update', [BookController::class, 'update']);
    Route::delete('/buku-hapus', [BookController::class, 'destroy']);


    // Mengatur Izin Pinjam
    Route::get('/list-pengajuan', [RentPermController::class, 'index']);
    Route::get('/izinkan-pinjam/{id}', [RentPermController::class, 'izinkan']);
    Route::get('/tolak-pinjam/{id}', [RentPermController::class, 'tolak']);
    Route::get('/tambah-pinjaman', [RentPermController::class, 'create']);
    Route::post('/tambah-pinjaman', [RentPermController::class, 'store']);

    // Mengatur Pengembalian Buku
    Route::get('/kembalikan-buku', [RentFinishController::class, 'index']);
    Route::get('/kembalikan-save/{id}', [RentFinishController::class, 'update']);

    // Laporan Peminjaman
    Route::get('/laporan-peminjaman', [LaporanController::class, 'index']);

});

    
