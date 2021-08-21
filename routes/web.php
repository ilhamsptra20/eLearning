<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Admin routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');    
});

// Lecturer routes
Route::prefix('lecturer')->middleware('auth:lecturer')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('lecturer');
    
});

// Student routes
Route::prefix('student')->middleware('auth:student')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('student');
});
