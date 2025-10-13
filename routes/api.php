<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->name('verification.verify');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/email/resend', [VerificationController::class, 'resend'])
        ->name('verification.send');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/profile', [ProfileController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/products', [ProductController::class, 'getProducts']);
    Route::get('/products/{id}', [ProductController::class, 'getProductsById']);
    
    Route::post('/comments/add', [CommentController::class, 'sendComment']);
    Route::put('/comments/{id}', [CommentController::class, 'updateComment']);
    Route::get('/products/{product_id}/comments', [CommentController::class, 'getCommentsById']);
    
    Route::post('/cart/add', [CartController::class, 'addProduct']);
    Route::get('/cart/{userId}', [CartController::class, 'getCart']);
});