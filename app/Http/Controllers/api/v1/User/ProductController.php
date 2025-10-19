<?php

namespace App\Http\Controller\api\v1\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request) {
        $query = Product::query();

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        };

        if ($request->has('sort_by') && $request->has('sort_dir')) {
            $query->orderBy($request->sort_by, $request->sort_dir);
        };

        if ($request->has('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        };

        return $query->paginate(15);
    }

    public function getProductsById($id, Request $request) {
        $product = Product::where('id', $id)->get();

        return response()->json(
            $product
        );
    }
}
