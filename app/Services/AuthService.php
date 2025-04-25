<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials do not match our records.'],
            ]);
        }

        $user = Auth::user();

        if ($user->roles !== 'admin') {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => ['You are not allowed to login from here.'],
            ]);
        }

        if (is_null($user->email_verified_at)) {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => ['Only the admin who has verified their account should be able to login here.'],
            ]);
        }

        return $user;
    }

    public function logout()
    {
        Auth::logout();
    }
}
