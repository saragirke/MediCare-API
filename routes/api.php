<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VitaminsController;
use App\Http\Controllers\SuperfoodsController;
use App\Http\Controllers\AuthController;

/* Routes till controllers */
Route::resource('vitamins', VitaminsController::class)->middleware('auth:sanctum');
Route::resource('superfoods', SuperfoodsController::class)->middleware('auth:sanctum');

//Testar nytt sätt, sparar Matias sätt
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//test update
Route::put('/update', [AuthController::class, 'update'])->middleware('auth:sanctum');

//Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

