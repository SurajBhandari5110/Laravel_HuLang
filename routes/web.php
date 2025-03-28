<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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
    return view('index');
})->name('home');

Route::get('/register',[UserController::class,'loadRegister']);
Route::post('/register',[UserController::class,'studentRegister'])->name('studentRegister');

Route::get('/login',[UserController::class,'loadLogin']);
Route::post('/login',[UserController::class,'userLogin'])->name('userLogin');

Route::get('/verification/{id}',[UserController::class,'verification']);
Route::post('/verified',[UserController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/dashboard',[UserController::class,'loadDashboard'])->name('dashboard');

Route::get('/resend-otp',[UserController::class,'resendOtp'])->name('resendOtp');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//Posting blogs from dashboard:

// In routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});


