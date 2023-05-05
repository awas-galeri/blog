<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;

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


Route::middleware('guest')->group(function () {

    Route::prefix('/')->controller(LandingPageController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/about', 'about')->name('about');
        Route::get('/contact', 'contact')->name('contact');
    });

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'attemptLogin'])->name('attemptLogin');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegist'])->name('storeRegist');
    Route::get('/register/verify/{verify_key}', [AuthController::class, 'verify'])->name('verify');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/blog', 'blog')->name('dashboard.blog');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

















// Route::get('/', function () {
//     return view('welcome');
// });
