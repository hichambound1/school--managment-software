<?php

use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BackOffice\OptionController;
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

    Route::middleware([checkAdminRole::class])->group(function () {

        Route::prefix('admin')->group(function () {
            Route::prefix('plans')->group(function () {
                Route::get('/list', [PlanController::class, 'viewAll']);
                Route::get('/{id}', [PlanController::class, 'viewOne']);
                Route::PUT('/update', [PlanController::class, 'update']);
                Route::POST('/store', [PlanController::class, 'store']);
                Route::DELETE('/deleteOne', [PlanController::class, 'delete']);
            });
            Route::prefix('options')->group(function () {
                Route::get('/{id}', [OptionController::class, 'getOne']);
                Route::PUT('/update', [OptionController::class, 'UpdateOneOption']);
                Route::POST('/store', [OptionController::class, 'StoreOneOption']);
                Route::POST('/storeMany', [OptionController::class, 'StoreManyOption']);
                Route::DELETE('/deleteOne/{id}', [OptionController::class, 'deleteOption']);
            });
            Route::prefix('adminUsers')->group(function () {

                Route::get('/list', [AdminUsersController::class, 'getUsers']);
                Route::put('/DeactivateUser/{id}', [AdminUsersController::class, 'DeactivateUser']);
                Route::put('/DeactivateUser/{id}', [AdminUsersController::class, 'ActivateUser']);
            });
        });
    });
});
