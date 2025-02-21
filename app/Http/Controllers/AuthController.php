<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
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
        if (!$this->verifyRecaptcha($request->input('g-recaptcha-response'))) {
            return back()->withErrors(['recaptcha' => 'ReCAPTCHA verification failed.']);
        }

        $user = User::create($request->validated());
        Auth::login($user);

        return to_route('dashboard');
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
