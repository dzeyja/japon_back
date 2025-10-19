<?php

namespace App\Http\Controllers\admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function dashboard() {
        $users = User::take(5)->get();
        $products = Product::take(5)->get();
        $comments = Comment::with('user', 'product')->take(5)->get();

        return view('admin.dashboard', [
            'usersCount'=>User::count(),
            'productsCount'=>Product::count(),
            'commentsCount'=>Comment::count(),
            'users' => $users,
            'products'=> $products,
            'comments' => $comments,
        ]);
    }

    public function showLogin() {
        return view('admin.auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email'=>['required', 'email'],
            'password'=> ['required', 'string']
        ]);

        if(Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();

            return back()->withErrors(['email' => 'Access denied. Admins only.']);
        };

    }
}
