<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [\App\Http\Controllers\Api\AuthController::class, 'me']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

    Route::controller(\App\Http\Controllers\Api\JenisKegiatanController::class)->group(function () {
        Route::get('/list-jenis-kegiatan', 'index');
        Route::prefix('jenis-kegiatan')->group(function () {
            Route::post('/', 'store');
            Route::get('/{jenisKegiatanId}', 'show');
            Route::put('/{jenisKegiatanId}', 'update');
            Route::delete('{jenisKegiatanId}', 'destroy');
        });
    });
});
