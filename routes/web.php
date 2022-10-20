<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register/post', [UserController::class, 'store'])->name('register-post');
Route::any('/verifyEmail/{id}/{date}/{hash}', [UserController::class, 'verifying'])->name('register-verifying');

Route::post('/login', [UserController::class, 'login'])->name('login-post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout-post');

Route::middleware(['auth:user', 'verified'])->group(function () {
    Route::get('/home', function () {return view('dashboard');})->name('home');
});
