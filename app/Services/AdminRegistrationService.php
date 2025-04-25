<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Notifications\EmailVerificationNotification;

class AdminRegistrationService
{
    public function register(array $data)
    {
        // Validation
        $validator = Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // User Creation
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles' => 'admin',
            'verification_code' => rand(100000, 999999),
        ]);

        // Send email verification
        $user->notify(new EmailVerificationNotification($user->verification_code));

        return $user;
    }
}
