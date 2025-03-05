<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthenticateController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Login',['status'=> session('status')]);
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('web')->attempt($credentials)) { // Authenticate via 'users' table
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'jobseeker') {
                $request->session()->regenerate();
                return redirect()->route('home');

            } elseif ($user->role === 'employer') {
                $request->session()->regenerate();
                return redirect()->route('home');

            }
        }
        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.'
        ]);
    }
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
