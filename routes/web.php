<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', [ExampleController::class, 'index'])
    ->name('example.index');


// Auth routes
Route::get('/login', [UserController::class, 'showLoginForm'])
    ->name('login');

Route::post('/', [UserController::class, 'login'])
    ->name('login.submit');

// Shops CRUD route
Route::prefix('/shops')->group(function() {
    Route::get('/', [ShopController::class, 'index'])
        ->name('shops.index');

    Route::get('/create', [ShopController::class, 'create'])
        ->name('shops.create');

    Route::post('/store', [ShopController::class, 'store'])
        ->name('shops.store');

    Route::get('/{id}', [ShopController::class, 'show'])
        ->name('shops.show');

    Route::get('/edit/{id}', [ShopController::class, 'edit'])
        ->name('shops.edit')
        ->middleware('auth:sanctum');

    Route::post('/update/{id}', [ShopController::class, 'update'])
        ->name('shops.update');

    Route::delete('/delete/{id}', [ShopController::class, 'destroy'])
        ->name('shops.delete');
});

