<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerRegistrationService;
use Illuminate\Validation\ValidationException;

class CustomerRegisterController extends Controller
{
    protected $registrationService;

    public function __construct(CustomerRegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function showForm()
    {
        return view('auth.customer_register');
    }

    public function register(Request $request)
    {
        try {
            $user = $this->registrationService->register($request->all());

            return redirect()->route('verification.form', ['id' => $user->id])
                ->with('success', 'Registration successful. Please check your email for the verification code.');
        } catch (ValidationException $e) {
            return redirect()->route('customer.register')
                ->withErrors($e->validator)
                ->withInput();
        }
    }
}
