<?php

namespace App\Http\Controllers;

use App\Models\Cart_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addProduct(Request $request) {
        $userId = $request->user_id;
        $productId = $request->product_id;

        $cartItem = Cart_item::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $product = Product::findOrFail($productId);

            $cartItem = Cart_item::create([
                'user_id'=>$userId,
                'product_id'=>$productId,
                'quantity'=>1,
                'price'=>$product->price
            ]);
        }

        return response()->json($cartItem);
    }

    public function getCart($userId) {
        $cartItems = Cart_item::query()
            ->where('user_id', $userId)
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->select(
                'cart_items.id',
                'cart_items.quantity',
                'cart_items.price',
                'products.title',
                'products.image',
                DB::raw('cart_items.quantity * cart_items.price as total_price')
            )
            ->get();

        $total = $cartItems->sum('total_price');

        return response()->json([
            'items' => $cartItems,
            'total' => $total
        ]);
    }
}
