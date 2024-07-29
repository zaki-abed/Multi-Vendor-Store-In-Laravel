<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;

use Illuminate\Support\Facades\Route;


// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

// Categories Routes
Route::resource('dashboard/categories', CategoriesController::class);
