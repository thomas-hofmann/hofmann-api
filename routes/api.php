<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\CustomDataController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SportTeamController;

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

// Cars API
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

// Movies API
Route::prefix('movies')->group(function () {
    // Öffentliche Endpunkte
    Route::get('/', [MovieController::class, 'index']);
    Route::get('{id}', [MovieController::class, 'show']);

    // Geschützte Endpunkte mit API-Key
    Route::middleware(['apikey', 'throttle:60,1'])->group(function () {
        Route::post('/', [MovieController::class, 'store']);
        Route::put('{id}', [MovieController::class, 'update']);
        Route::delete('{id}', [MovieController::class, 'destroy']);
    });
});

// Games API
Route::prefix('games')->group(function () {
    // Öffentliche Endpunkte
    Route::get('/', [GameController::class, 'index']);
    Route::get('{id}', [GameController::class, 'show']);

    // Geschützte Endpunkte mit API-Key
    Route::middleware(['apikey', 'throttle:60,1'])->group(function () {
        Route::post('/', [GameController::class, 'store']);
        Route::put('{id}', [GameController::class, 'update']);
        Route::delete('{id}', [GameController::class, 'destroy']);
    });
});

// Sport Teams API
Route::prefix('sport-teams')->group(function () {
    // Öffentliche Endpunkte
    Route::get('/', [SportTeamController::class, 'index']);
    Route::get('{id}', [SportTeamController::class, 'show']);

    // Geschützte Endpunkte mit API-Key
    Route::middleware(['apikey', 'throttle:60,1'])->group(function () {
        Route::post('/', [SportTeamController::class, 'store']);
        Route::put('{id}', [SportTeamController::class, 'update']);
        Route::delete('{id}', [SportTeamController::class, 'destroy']);
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
