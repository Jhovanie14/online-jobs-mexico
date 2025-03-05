<?php

namespace App\Http\Controllers\Dashboard\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobSeekerProfileController extends Controller
{
    public function profile(Jobseeker $profile)
    {
        $categories = Category::with([
            'skills' => function ($query) use ($profile) {
                $query->whereHas('jobseeker', function ($q) use ($profile) {
                    $q->where('jobseeker_id', $profile->id);
                })->with([
                    'jobseeker' => function ($q) use ($profile) {
                        $q->wherePivot('jobseeker_id', $profile->id) // Ensure proper pivot filtering
                            ->select('jobseeker_skills.skill_id', 'jobseeker_skills.rating', 'jobseeker_skills.description', 'jobseeker_skills.experience');
                    }
                ]);
            }
        ])->get();

        return Inertia::render('Dashboard/Info', [
            'profile' => $profile,
            'categories' => $categories
        ]);
    }
}
