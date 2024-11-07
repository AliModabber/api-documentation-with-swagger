<?php

use App\Http\Controllers\Api;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 Route::post('/register',[AuthController::class,'register']);

 Route::get('/users',[HomeController::class,'users']);

