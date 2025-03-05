<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListingController extends Controller
{
    public function index(Request $request)
    {
      

        $listings = JobPost::with(['employer' , 'skills' => function ($query){
            $query->withPivot('id');
        }])->filter(request(['search', 'employment_type']))->latest()->paginate(5)->withQueryString();
     
        return Inertia::render('Dashboard/Jobs/Listings', ['listings' => $listings]);
    }
}
