<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('SuperAdmin')->name('SuperAdmin.')->group(function(){
    Route::middleware(['guest','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.SuperAdmin.login')->name('login');
        Route::view('/register','dashboard.SuperAdmin.register')->name('register');
        Route::post('/create', [SuperAdminController::class, 'create'])->name('create');
        Route::post('/check', [SuperAdminController::class, 'check'])->name('check');

    });
    Route::middleware(['auth','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.SuperAdmin.home')->name('home');
        Route::post('/logout',[SuperAdminController::class, 'logout'])->name('logout');

    });
});
