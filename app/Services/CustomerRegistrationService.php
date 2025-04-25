<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Notifications\EmailVerificationNotification;

class CustomerRegistrationService
{
    public function register(array $data)
    {
        // Validate the input
        $validator = Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // Create user
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles' => 'customer',
            'verification_code' => rand(100000, 999999),
        ]);

        // Send verification notification
        $user->notify(new EmailVerificationNotification($user->verification_code));

        return $user;
    }
}
