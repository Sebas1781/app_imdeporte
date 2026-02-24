<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoletinPublicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\BoletinController;
use App\Http\Controllers\Admin\UserController;

// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/boletines', [BoletinPublicController::class, 'index'])->name('boletines.index');
Route::get('/boletines/{boletin}', [BoletinPublicController::class, 'show'])->name('boletines.show');

// Auth routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Admin routes (protected)
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Carousel CRUD
    Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index');
    Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
    Route::post('/carousel', [CarouselController::class, 'store'])->name('carousel.store');
    Route::get('/carousel/{carousel}/edit', [CarouselController::class, 'edit'])->name('carousel.edit');
    Route::put('/carousel/{carousel}', [CarouselController::class, 'update'])->name('carousel.update');
    Route::delete('/carousel/{carousel}', [CarouselController::class, 'destroy'])->name('carousel.destroy');

    // Boletines CRUD
    Route::get('/boletines', [BoletinController::class, 'index'])->name('boletines.index');
    Route::get('/boletines/create', [BoletinController::class, 'create'])->name('boletines.create');
    Route::post('/boletines', [BoletinController::class, 'store'])->name('boletines.store');
    Route::get('/boletines/{boletin}/edit', [BoletinController::class, 'edit'])->name('boletines.edit');
    Route::put('/boletines/{boletin}', [BoletinController::class, 'update'])->name('boletines.update');
    Route::delete('/boletines/{boletin}', [BoletinController::class, 'destroy'])->name('boletines.destroy');

    // Users CRUD
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
