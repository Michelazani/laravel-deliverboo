<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Admin\DishController as AdminDishController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')
    ->name('admin.')
    ->prefix('/admin')
    ->group(function () {
        Route::get('/restaurants', [AdminDashboardController::class, 'index'])->name('home');
        Route::post('/restaurants', [AdminRestaurantController::class, 'store'])->name('restaurants.store');
        Route::get('/restaurants/create', [AdminRestaurantController::class, 'create'])->name('restaurants.create');
        Route::get('/restaurants/{restaurant}', [AdminRestaurantController::class, 'show'])->name('restaurants.show');
        Route::post('/dishes', [AdminDishController::class, 'store'])->name('dishes.store');
        Route::get('/dishes/create', [AdminDishController::class, 'create'])->name('dishes.create');
        Route::get('/dishes/{dish}', [AdminDishController::class, 'show'])->name('dishes.show');
    });