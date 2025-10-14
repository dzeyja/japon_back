<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'email'=>['required', 'email', 'unique:users,email'],
            'password'=>['required', 'min:6']
        ]);

        $user = User::create([
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'fullName' => null,
            'phone' => null,
            'gender' => null,
            'birthDate' => null,
            'avatar' => null,
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));

        return response()->json([
            'user'=>$user,
            'profile'=>$profile,
            'message'=>'Вы успешно зарегались'
        ], 201);
    }   

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        }
 
        return response()->json([
            'message'=>'Неверный email или пароль'
        ], 401);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return response()->json([
            'message'=>'Вы успешно вышли'
        ]);
    }
}
