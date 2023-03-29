<?php

use App\Http\Controllers\BackOffice\PlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('admin')->group(function () {
    Route::prefix('plans')->group(function () {
        Route::get('/List', [PlanController::class, 'viewAll']);
        Route::get('/{id}', [PlanController::class, 'viewOne']);
        Route::PUT('/update', [PlanController::class, 'update']);
        Route::POST('/store', [PlanController::class, 'store']);
        Route::DELETE('/deleteOne', [PlanController::class, 'delete']);
    });
});
