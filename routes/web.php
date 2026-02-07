<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;


//ADMIN

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/{id}', [AdminController::class, 'show'])->name('show');

        Route::put('/{id}/status', [AdminController::class, 'updateStatus'])->name('status');
        Route::post('/{id}/feedback', [AdminController::class, 'storeFeedback'])->name('feedback');
});

Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('user', KelolaUserController::class)->middleware('auth');;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//SISWA
Route::get('/', [SiswaController::class, 'home'])->name('home');
Route::get('about', [SiswaController::class, 'about'])->name('about');
Route::resource('aduan', AduanController::class);
Route::get('/aduan-sukses/{id}', [AduanController::class, 'sukses'])->name('aduan.sukses');
Route::post('/aduan/lacak', [AduanController::class, 'lacak'])->name('aduan.lacak');
