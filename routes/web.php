<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', [ExampleController::class, 'index'])
    ->name('example.index');

Route::prefix('/shops')->group(function() {
    Route::get('/', [ShopController::class, 'index'])
    ->name('shops.index');

    Route::get('/create', [ShopController::class, 'create'])
        ->name('shops.create');
});


