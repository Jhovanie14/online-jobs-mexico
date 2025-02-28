<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    public function register()
    {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        Profile::create(['user_id' => $user->id]);


        Auth::login($user);

        $user->sendEmailVerificationNotification();
        
        return redirect()->route('verification.notice');
    }

    public function showVerificationNotice()
    {
        if (!Auth::check()) {
            return redirect('/login')->withErrors(['message' => 'You must be logged in to verify your email.']);
        }

        return Inertia::render('Auth/VerifyEmail');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        $request->user()->refresh();

        return redirect()->route('skills.index');
    }

    public function resendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    public function authenticate(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Invalid credentials. Please try again..']);
        }

        $request->session()->regenerate();

        return to_route('dashboard');
    }

    private function verifyRecaptcha($recaptchaResponse)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptchaResponse,
        ]);

        return $response->json()['success'];
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
