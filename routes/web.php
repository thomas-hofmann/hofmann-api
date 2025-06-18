<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\WeatherController;

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

// Weather API
Route::get('/weather', [WeatherController::class, 'index']);
Route::get('/weather/{id}', [WeatherController::class, 'show']);

Route::middleware('apikey')->group(function () {
    Route::post('/weather', [WeatherController::class, 'store']);
    Route::put('/weather/{id}', [WeatherController::class, 'update']);
    Route::delete('/weather/{id}', [WeatherController::class, 'destroy']);
});
