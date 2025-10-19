<?php

use App\Http\Controllers\api\v1\User\FavoritesController;
use App\Http\Controllers\api\v1\User\CartController;
use App\Http\Controllers\api\v1\User\CommentController;
use App\Http\Controllers\api\v1\User\ProductController;
use App\Http\Controllers\api\v1\User\ProfileController;
use App\Http\Controllers\api\v1\User\AuthController;
use App\Http\Controllers\api\v1\User\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed'])
    ->name('verification.verify');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/email/resend', [VerificationController::class, 'resend'])
        ->name('verification.send');
});

Route::prefix('user')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
    });
    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        
        Route::prefix('profile')->group(function () {
            Route::put('/update', [ProfileController::class, 'index']);
        });
    
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'getProducts']);
            Route::get('/{id}', [ProductController::class, 'getProductsById']);
        });        
        
        Route::prefix('comments')->group(function () {
            Route::post('/add', [CommentController::class, 'sendComment']);
            Route::put('/{id}', [CommentController::class, 'updateComment']);
            Route::get('/products/{product_id}/comments', [CommentController::class, 'getCommentsById']);
        });
        
        Route::prefix('cart')->group(function () {
            Route::post('/add', [CartController::class, 'addProduct']);
            Route::get('/{userId}', [CartController::class, 'getCart']);
        });

        Route::prefix('favorite')->group(function () {
            Route::post('/add', [FavoritesController::class, 'addFavorite']);
            Route::get('/{userId}', [FavoritesController::class, 'getFavorites']);
        });
    });
});
