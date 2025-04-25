<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EmailVerificationService
{
    public function verify(array $data): User
    {
        // Validate inputs
        $validator = Validator::make($data, [
            'user_id' => 'required|exists:users,id',
            'verification_code' => 'required|numeric|digits:6',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // Find user by ID and verification code
        $user = User::where('id', $data['user_id'])
            ->where('verification_code', $data['verification_code'])
            ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'verification_code' => ['Invalid verification code.'],
            ]);
        }

        // Update verification status
        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();

        return $user;
    }
}
