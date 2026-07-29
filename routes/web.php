<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PetaDataController;
use App\Http\Controllers\sawitController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/tentang', [TentangController::class, 'index']);
Route::get('/map', [PetaDataController::class, 'index']);
Route::get('/data', [DataController::class, 'index']);
Route::get('/dashboard/sawit', [sawitController::class, 'index']);

/** Login is a dialog now, not a page. Kept so existing links and bookmarks still work. */
Route::get('/login', fn () => redirect('/')->with('openLogin', true))->name('login');

/** The pabrik dashboard was folded into the sawit dashboard. */
Route::get('/dashboard/sawit/pabrik', fn () => redirect('/dashboard/sawit'));

Route::get('/logout', function () {
    session()->flush();

    return redirect('/');
});
