<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('Auth/Login');
    }
    public function Register()
    {
        return Inertia::render('Auth/Register');
    }
    public function store(RegisterRequest $request, User $user)
    {
        $user = User::create($request->validated());

        Auth::login($user);

        // Return user data as a resource
        return to_route('dashboard');
    }
    public function authenticate(Request $request,)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }
        $request->session()->regenerate();

        return to_route('dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home');
    }
}
