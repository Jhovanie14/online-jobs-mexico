<?php

namespace App\Http\Controllers\Dashboard\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployerProfileController extends Controller
{
    public function settings()
    {
        return Inertia::render('Dashboard/Employer/EmployerSettings');
    }
}
