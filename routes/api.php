<?php

use App\Http\Controllers\BackOffice\AdminUsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BackOffice\OptionController;
use App\Http\Controllers\BackOffice\PlanController;
use App\Http\Controllers\BackOffice\RolesPermissionsController;
use Illuminate\Support\Facades\Route;



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
                Route::get('/', [OptionController::class, 'getAll']);
                Route::get('/{id}', [OptionController::class, 'getOne']);
                Route::PUT('/update', [OptionController::class, 'UpdateOneOption']);
                Route::POST('/store', [OptionController::class, 'StoreOneOption']);
                Route::POST('/storeMany', [OptionController::class, 'StoreManyOption']);
                Route::DELETE('/deleteOne/{id}', [OptionController::class, 'deleteOption']);
            });
            Route::prefix('roles')->group(function () {
                Route::get('getAll/', [RolesPermissionsController::class, 'getAll']);
                Route::get('getOne/{id}', [RolesPermissionsController::class, 'getOne']);
                Route::post('/store', [RolesPermissionsController::class, 'storeRole']);
                Route::put('/update', [RolesPermissionsController::class, 'updateRole']);
                Route::put('/syncPermissions', [RolesPermissionsController::class, 'syncPermissions']);
            });
            Route::prefix('permissions')->group(function () {
                Route::get('getAll/', [RolesPermissionsController::class, 'allPermissions']);
                Route::get('getOne/{id}', [RolesPermissionsController::class, 'GetPermission']);
                Route::post('store', [RolesPermissionsController::class, 'storePermission']);
                Route::put('/update', [RolesPermissionsController::class, 'updatePermission']);
            });
            Route::prefix('adminUsers')->group(function () {

                Route::get('/list', [AdminUsersController::class, 'getUsers']);
                Route::put('/DeactivateUser/{id}', [AdminUsersController::class, 'DeactivateUser']);
                Route::put('/ActivateUser/{id}', [AdminUsersController::class, 'ActivateUser']);
                Route::put('/update', [AdminUsersController::class, 'update']);
                Route::post('/storeAdmin', [AdminUsersController::class, 'storeAdmin']);
                Route::DELETE('/delete/{id}', [AdminUsersController::class, 'deleteAdmin']);
            });
        });
    });
});
