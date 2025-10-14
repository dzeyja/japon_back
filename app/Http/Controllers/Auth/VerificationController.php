<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['message' => 'Неверная ссылка для верификации'], 400);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email уже подтверждён'], 200);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return response()->json(['message' => 'Email успешно подтверждён'], 200);
    }

    public function resend(Request $request)
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email уже подтверждён'], 200);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(['message' => 'Письмо для верификации отправлено'], 200);
    }
}