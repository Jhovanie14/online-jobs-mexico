<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{

    public function create()
    {
        $skills = Skill::all();
        return Inertia::render('Profile', [
            'skills' => $skills
        ]);
    }
    public function profile(Profile $profile)
    {

        return inertia('Dashboard/Profile', [
            'profile' => $profile
        ]);
    }
    public function storeProfile(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'job_title' => 'required|string',
            'job_description' => 'required|string',
            'educational_attainment' => 'required|string',
            'job_preference' => 'required|string',
            'hour_per_day' => 'required|numeric',
            'hourly_rate' => 'required|numeric',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'skills' => 'required|array',
            'skills.*.id' => 'required|exists:skills,id',
            'skills.*.rating' => 'required|integer|min:0|max:5',
            'skills.*.description' => 'nullable|string'
        ]);

        $user = Auth::user();
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],  // Find by user_id
            $data  // Update or create with validated data
        );

        $skillsWithPivotData = [];
        foreach ($data['skills'] as $skillData) {
            $skillsWithPivotData[$skillData['id']] = [
                'rating' => $skillData['rating'],
                'description' => $skillData['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $profile->skills()->sync($skillsWithPivotData);

        return to_route('profile.summary', ['profile' => $profile->id]);
    }
}
