<?php

namespace App\Http\Controllers;

use App\Enums\ProfileGender;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class ProfileController extends Controller
{
    // public function index(Request $request) {
    //     $data = $request->validate([
    //         'user_id'=>['required', 'exists:users,id'],

    //         'fullname'=>['string', 'required', 'max:255'],
    //         'phone'=>['string', 'nullable'],
    //         'gender'=>['nullable', new Enum(ProfileGender::class)],
    //         'birthDate'=>['nullable', 'date'],
    //         'avatar'=>['nullable', 'string'],

    //         'notifications_email' => ['boolean'],
    //         'notifications_sms' => ['boolean'],
    //         'notifications_push' => ['boolean']
    //     ]);

        

    // }
}
