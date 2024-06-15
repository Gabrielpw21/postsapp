<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request->user();
});

Route::get('/getAllUsers', [UserController::class, 'getAllUsers']);

Route::post('/register', [UserController::class, 'store']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/allProducts', [ProductController::class,'index']);
Route::get('getProductsByUserId/{id}', [ProductController::class,'getProductsByUserId']);

Route::group(['prefix' => 'product','middleware' => 'auth:sanctum'], function() {
    Route::post('addProduct', [ProductController::class,'addProduct']);
    Route::post('update/{id}', [ProductController::class,'update']);
    Route::get('edit/{id}', [ProductController::class,'edit']);
    Route::delete('delete/{id}', [ProductController::class,'delete']);
});