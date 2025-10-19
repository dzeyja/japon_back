<?php

namespace App\Http\Controllers\api\v1\User;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function addFavorite(Request $request) {
        $userId = auth()->user()->id;
        $productId = $request->input('product_id');

        if (!$productId) {
            return response()->json([
                'message'=>'product_id обзателен'
            ], 400);
        }

        $exists = Favorites::where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if ($exists) {
            return response()->json([
                'message'=>'Товар уже добавлен в избранное'
            ], 409);
        }

        $favorite = Favorites::create([
            'user_id'=>$userId,
            'product_id'=>$productId
        ]);

        return response()->json([
            'message'=>'Вы упешно добавили товар в избарнное',
            'data'=>$favorite
        ]);
    }

    public function getFavorites($userId) {
        $favorites = Favorites::where('user_id', $userId)->get();

        return response()->json(
            $favorites
        );
    }
}

