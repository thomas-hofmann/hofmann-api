<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\CustomDataController;

Route::prefix('books')->group(function () {
    // Öffentliche Endpunkte
    Route::get('/', [BookController::class, 'index']);
    Route::get('{id}', [BookController::class, 'show']);
    // Geschützte Endpunkte mit API-Key
    Route::middleware(['apikey', 'throttle:60,1'])->group(function () {
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
    Route::middleware(['apikey', 'throttle:60,1'])->group(function () {
        Route::post('/', [CarController::class, 'store']);
        Route::put('{id}', [CarController::class, 'update']);
        Route::delete('{id}', [CarController::class, 'destroy']);
    });
});

// Weather API
Route::prefix('weather')->group(function () {
    // Öffentliche Endpunkte
    Route::get('/', [WeatherController::class, 'index']);
    Route::get('{id}', [WeatherController::class, 'show']);

    // Geschützte Endpunkte mit API-Key
    Route::middleware(['apikey', 'throttle:60,1'])->group(function () {
        Route::post('/', [WeatherController::class, 'store']);
        Route::put('{id}', [WeatherController::class, 'update']);
        Route::delete('{id}', [WeatherController::class, 'destroy']);
    });
});

// Custom Data
Route::prefix('data')->group(function () {
    Route::middleware(['apikey', 'throttle:60,1'])->group(function () {
        Route::get('/', [CustomDataController::class, 'index']);
        Route::get('{id}', [CustomDataController::class, 'show']);
        Route::post('/', [CustomDataController::class, 'store']);
        Route::put('{id}', [CustomDataController::class, 'update']);
        Route::delete('{id}', [CustomDataController::class, 'destroy']);

        Route::get('/category/{category}', [CustomDataController::class, 'getByCategory']);
    });
});