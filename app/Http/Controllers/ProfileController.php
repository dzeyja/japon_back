<?php

namespace App\Http\Controllers;

use App\Enums\ProfileGender;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();

        $data = $request->validate([
            'fullName'=>['string', 'required', 'max:255'],
            'phone'=>['string', 'nullable'],
            'gender'=>['nullable', new Enum(ProfileGender::class)],
            'birthDate'=>['nullable', 'date'],
            'avatar'=>['required', 'string'],

            'notifications_email' => ['boolean'],
            'notifications_sms' => ['boolean'],
            'notifications_push' => ['boolean']
        ]);

        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );
        
        return response()->json([
            'message'=>'Профиль успешно создан',
            'profile'=>$profile
        ]);
    }
}
