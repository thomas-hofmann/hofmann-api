<?php
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});
