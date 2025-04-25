<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmailVerificationService;
use Illuminate\Validation\ValidationException;

class VerificationController extends Controller
{
    protected $verificationService;

    public function __construct(EmailVerificationService $verificationService)
    {
        $this->verificationService = $verificationService;
    }

    public function showForm(Request $request)
    {
        $userId = $request->query('id');
        return view('auth.verify_email', compact('userId'));
    }

    public function verify(Request $request)
    {
        try {
            $this->verificationService->verify($request->all());

            return redirect()->route('login')
                ->with('success', 'Your email has been successfully verified!');
        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        }
    }
}
