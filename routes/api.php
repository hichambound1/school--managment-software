<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BackOffice\PlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/registerAdmin', [AuthController::class, 'registerAdmin']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        Route::prefix('plans')->group(function () {
            Route::get('/list', [PlanController::class, 'viewAll']);
            Route::get('/{id}', [PlanController::class, 'viewOne']);
            Route::PUT('/update', [PlanController::class, 'update']);
            Route::POST('/store', [PlanController::class, 'store']);
            Route::DELETE('/deleteOne', [PlanController::class, 'delete']);
        });
    });
});
