<?php

namespace App\Http\Controllers\admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request) {
        // $validated = $request->validate([
        //     'title' => ['required', 'string', 'max:255'],
        //     'sku' => ['required', 'string', 'max:255'],
        //     'brand' => ['required', 'string', 'max:255'],
        //     'price' => ['required', 'numeric', 'min:0'],
        //     'details' => ['required', 'array'],
        //     'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        //     'category_id' => ['required', 'exists:categories,id'],
        // ]);

        // $product = Product::create([
        //     'title'=>$validated['title'],
        //     'sku'=>$validated['sku'],
        //     'brand'=>$validated['brand'],
        //     'price'=>$validated['price'],
        //     'details'=>$validated['details'],
        //     'image'=>$validated['image'],
        //     'category_id'=>$validated['category_id'],
        // ]);

        // return res
    }
} 