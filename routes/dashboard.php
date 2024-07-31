<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;

use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'auth',
    // 'name' => 'dashboard',
    //'as' => 'dashboard', // in style url -> <dashboard class="dashboard categories"></dashboard>
    //'prefix' => 'dashboard', // in url dashboard/dashboard/categories
    // 'namespace' => 'App\Http\Controllers\Dashboard'
], function(){

    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard')
            ->middleware('verified');
    Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard')
            ->middleware('verified');

    // Categories Routes
    Route::resource('dashboard/categories', CategoriesController::class);
            // ->except('create', 'stroe')
            // ->only('create')
    // Route::resource('dashboard/categories', CategoriesController::class)->names(['index' => 'dashboard.categories.index]);

});

// Route::middleware('x')->as('x')->prefix('x')->group(function(){ route... });
