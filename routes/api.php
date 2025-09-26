<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'getProducts'])->middleware('auth:sanctum');
Route::get('/products/{id}', [ProductController::class, 'getProductsById'])->middleware('auth:sanctum');

Route::post('/comments', [CommentController::class, 'sendComment'])->middleware('auth:sanctum');
Route::put('/comments/{id}', [CommentController::class, 'updateComment'])->middleware('auth:sanctum');
Route::get('/products/{product_id}/comments', [CommentController::class, 'getCommentsById'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});