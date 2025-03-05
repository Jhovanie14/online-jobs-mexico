<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterEmployerController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/RegisterEmployer');
    }
    public function store(Request $request)
    {
        sleep(2);

        $credentials = $request->validate([

            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create($credentials);
        $user->role = 'employer';
        $user->save();
        
        $user->employer()->create([
            'full_name' => $request->full_name,
        ]);

        // verify email
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('home');
    }
}
