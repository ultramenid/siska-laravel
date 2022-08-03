<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\FrontendDashboardController;
use App\Http\Controllers\PetaDataController;
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
Route::get('/tentang/siska', [TentangController::class, 'index']);
Route::get('/tentang/tim', [TentangController::class, 'tim']);
Route::get('/tentang/faq', [TentangController::class, 'faq']);
Route::get('/dashboard/pabrik', [FrontendDashboardController::class, 'index']);
Route::get('/dashboard/izin', [FrontendDashboardController::class, 'izin']);
Route::get('/dashboard/sawitrakyat', [FrontendDashboardController::class, 'sawitrakyat']);
Route::get('/map', [PetaDataController::class, 'index']);
Route::get('/daftaristilah', [PetaDataController::class, 'daftaristilah']);


