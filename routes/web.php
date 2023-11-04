<?php

use App\Models\Perusahaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfilePerusahaanController;

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

Route::group(['middleware' => ['auth', 'AdminMiddleware:Admin']], function () {
    // Dashboard Controller
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');


    // Guru Controller
    Route::get('/guru/index', [GuruController::class, 'index'])->name('guru.index');


    //  Siwa Controller

    Route::get('/siswa/index', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/update/{id}',  [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/delete/{id}',  [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Guru Controller

    Route::get('/guru/index', [GuruController::class, 'index'])->name('guru.index');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/update/{id}',  [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/delete/{id}',  [GuruController::class, 'destroy'])->name('guru.destroy');


    // Kategori Controller

    Route::get('/kategori/index', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{id}',  [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/delete/{id}',  [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Perusahaan Controller
    Route::get('/perusahaan/index', [PerusahaanController::class, 'index'])->name('perusahaan.index');
    Route::post('/perusahaan/store', [PerusahaanController::class, 'store'])->name('perusahaan.store');
    Route::get('/perusahaan/edit/{id}', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::put('/perusahaan/update/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
    Route::delete('/perusahaan/delete/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');
    // Profile Perusahaan
    Route::get('/profile/perusahaan', [ProfilePerusahaanController::class, 'index'])->name('profile.perusahaan');
    Route::post('/profile/perusahaan/store', [ProfilePerusahaanController::class, 'store'])->name('profile.perusahaan.store');
    Route::get('/profile/perusahaan/edit/{id}', [ProfilePerusahaanController::class, 'edit'])->name('profile.perusahaan.edit');
    Route::put('/profile/perusahaan/update/{id}', [PerusahaanController::class, 'update'])->name('profile.perusahaan.update');
    Route::delete('/profile/perusahaan/delete/{id}', [PerusahaanController::class, 'destroy'])->name('profile.perusahaan.destroy');
});

// Show login form
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login/auth', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [LoginController::class, 'registration']);
Route::post('/register/auth', [LoginController::class, 'register']);



// Homepage Controller
Route::get('/', [HomepageController::class, 'index'])->name('home.index');
// Route::get('/tes', [HomepageController::class, 'tes'])->name('home.tes');
Route::get('/jurnal', [HomepageController::class, 'jurnal'])->name('homepage.home');
Route::get('/perusahaan', [HomepageController::class, 'perusahaan'])->name('homepage.perusahaan');
