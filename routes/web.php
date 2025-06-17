<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 📚 Books API
Route::prefix('books')->group(function () {
    // Öffentliche Endpunkte
    Route::get('/', [BookController::class, 'index']);
    Route::get('{id}', [BookController::class, 'show']);

    // Geschützte Endpunkte mit API-Key
    Route::middleware('apikey')->group(function () {
        Route::post('/', [BookController::class, 'store']);
        Route::put('{id}', [BookController::class, 'update']);
        Route::delete('{id}', [BookController::class, 'destroy']);
    });
});

// 🚗 Cars API
Route::prefix('cars')->group(function () {
    // Öffentliche Endpunkte
    Route::get('/', [CarController::class, 'index']);
    Route::get('{id}', [CarController::class, 'show']);

    // Geschützte Endpunkte mit API-Key
    Route::middleware('apikey')->group(function () {
        Route::post('/', [CarController::class, 'store']);
        Route::put('{id}', [CarController::class, 'update']);
        Route::delete('{id}', [CarController::class, 'destroy']);
    });
});
