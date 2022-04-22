<?php

use App\Http\Controllers\KdcDailyRfidController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\UserController;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/import', [App\Http\Controllers\UsersImportController::class, 'show'])->name('show');
Route::post('/users/import', [App\Http\Controllers\UsersImportController::class, 'store'])->name('store');

Route::get('/kdcdailyrfid/import', [KdcDailyRfidController::class, 'excel_import'])->name('show');
Route::post('/kdcdailyrfid/import', [KdcDailyRfidController::class, 'excel_store'])->name('store');
Route::get('/kdcdailyrfid', [KdcDailyRfidController::class, 'excel_data'])->name('data');

Route::get('/kdcdailyrfid/dashboard', [KdcDailyRfidController::class, 'dashboard'])->name('dashboard');
