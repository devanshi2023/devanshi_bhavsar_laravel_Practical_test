<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminRegistrationService;
use Illuminate\Validation\ValidationException;

class AdminRegisterController extends Controller
{
    protected $registrationService;

    public function __construct(AdminRegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function showForm()
    {
        return view('auth.admin_register');
    }

    public function register(Request $request)
    {
        try {
            $user = $this->registrationService->register($request->all());

            return redirect()->route('verification.form', ['id' => $user->id])
                ->with('success', 'Registration successful. Please check your email for the verification code.');
        } catch (ValidationException $e) {
            return redirect()->route('admin.register')
                ->withErrors($e->validator)
                ->withInput();
        }
    }
}
