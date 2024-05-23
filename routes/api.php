<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FolderController;
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

Route::post('/login' ,[AuthController::class , 'login']);

Route::middleware("auth:sanctum")->group(function () {


    // folder api
    Route::prefix('folder')->group(function () {
        Route::get('/', [FolderController::class, 'index']);
        Route::get('/{id}', [FolderController::class, 'show']);
        Route::post('/', [FolderController::class, 'create']);
        Route::post('/{id}', [FolderController::class, 'update']);
        Route::delete('/{id}', [FolderController::class, 'destroy']);
    });


        // folder api
        Route::prefix('attachment')->group(function () {
            Route::get('/', [AttachmentController::class, 'index']);
            Route::get('/{id}', [AttachmentController::class, 'show']);
            Route::post('/', [AttachmentController::class, 'create']);
            Route::post('/{id}', [AttachmentController::class, 'update']);
            Route::delete('/{id}', [AttachmentController::class, 'destroy']);
        });
});
