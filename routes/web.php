<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\FrontendDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetaDataController;
use App\Http\Controllers\sawitController;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
// Route::get('/tentang/siska', [TentangController::class, 'index']);
// Route::get('/tentang/tim', [TentangController::class, 'tim']);
// Route::get('/tentang/faq', [TentangController::class, 'faq']);
Route::get('/dashboard/sawit', [sawitController::class, 'index']);
Route::get('/tentang', [TentangController::class, 'index']);

Route::get('/map', [PetaDataController::class, 'index']);
// Route::get('/daftaristilah', [PetaDataController::class, 'daftaristilah']);



    // sawit
    Route::get('/dashboard/sawit/pabrik', [FrontendDashboardController::class, 'index']);
    // Route::get('/dashboard/sawit/produksi', [FrontendDashboardController::class, 'produksi']);
    // Route::get('/dashboard/sawit/izin', [FrontendDashboardController::class, 'izin']);
    // Route::get('/dashboard/sawit/sawitrakyat', [FrontendDashboardController::class, 'sawitrakyat']);
    // Route::get('/dashboard/sawit/analisistutupansawit', [FrontendDashboardController::class, 'analisistutupansawit']);
    Route::get('/dashboard/sawit/mutasitanaman', [sawitController::class, 'mutasitanaman']);
    Route::get('/dashboard/sawit/mutasitanamanrakyat', [sawitController::class, 'mutasitanamanrakyat']);
    Route::get('/dashboard/sawit/pengusahaan', [sawitController::class, 'pengusahaan']);
    Route::get('/dashboard/sawit/perkebunanbesar', [sawitController::class, 'perkebunanbesar']);
    Route::get('/dashboard/sawit/perkebunanrakyat', [sawitController::class, 'perkebunanrakyat']);
    Route::get('/dashboard/sawit/produksi', [sawitController::class, 'produksi']);



//route logout
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
});
