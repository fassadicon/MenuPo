<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FoodController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// <------------------- ALL ADMIN ROUTES -------------------> //
Route::prefix('admin')->middleware('admin')->group(function () {
    // Show Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // <----------- FOOD CONTROLLER -----------> //
    // Show Food Management Section
    Route::get('/foods', [FoodController::class, 'index']);
    // Show Food Creation Form
    Route::get('/foods/create', [FoodController::class, 'create']);
    // Store Food Data
    Route::post('/foods', [FoodController::class, 'store']);


    // End of Admin Routes
});