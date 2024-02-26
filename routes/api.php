<?php

use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request->user();
});

Route::post('/register', [UserController::class, 'store']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/allPosts', [PostsController::class,'index']);
Route::get('getPostByUserId/{id}', [PostsController::class,'getPostByUserId']);

Route::group(['prefix' => 'posts','middleware' => 'auth:sanctum'], function() {
    Route::post('addPost', [PostsController::class,'addPost']);
    Route::post('update/{id}', [PostsController::class,'update']);
    Route::get('edit/{id}', [PostsController::class,'edit']);
    Route::delete('delete/{id}', [PostsController::class,'delete']);
});