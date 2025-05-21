<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\JadwalController;

// Route::middleware('client.auth')->group(function (){
//     Route::get('/products', [ProductApiController::class, 'index']);
//     Route::post('/products', [ProductApiController::class, 'store']);
// });

Route::middleware('client.auth')->group(function () {
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::post('/products', [ProductApiController::class, 'store']);
});

Route::middleware('teacher.auth')->group(function () {
    Route::get('/jadwals', [JadwalController::class, 'index']);
});
