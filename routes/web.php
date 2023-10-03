<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Car\CreateRideController;
use App\Http\Controllers\Car\StoreRideController;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginUserController::class, 'create'])->name('login');
    Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('user.home');
    });

    Route::prefix('car')->group(function (){
        Route::get('/create', CreateRideController::class);
        Route::post('/create', StoreRideController::class);
        Route::get('/export', \App\Http\Controllers\Car\ExportRidesController::class);
    });

});
