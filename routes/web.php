<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')
    ->middleware(['auth:api'])
    ->withoutMiddleware(ValidateCsrfToken::class)
    ->group(function () {

    Route::get('berita', [BeritaController::class, 'index']);
    Route::get('berita/{berita}', [BeritaController::class, 'show']);
    Route::post('berita', [BeritaController::class, 'store']);
    Route::put('berita/{berita}', [BeritaController::class, 'update']);
    Route::delete('berita/{berita}', [BeritaController::class, 'destroy']);

    Route::prefix('auth')
        ->group(function () {
        Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:api']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });
});

Route::get('/unauthenticated', function () {
    return response()->json(['message' => 'Unauthenticated'], 401);
})->name('login');