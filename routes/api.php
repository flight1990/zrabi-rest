<?php

use App\Http\Controllers\V1\PageController;
use App\Http\Controllers\V1\Admin\PageController as AdminPageController;
use App\Http\Controllers\V1\Admin\UserController as AdminUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {

    Route::controller(PageController::class)->prefix('pages')->group(function () {
        Route::get('/{slug}', 'show');
    });

    Route::prefix('admin')->group(function () {
        Route::apiResource('users', AdminUserController::class);
        Route::apiResource('pages', AdminPageController::class);
    });

});
