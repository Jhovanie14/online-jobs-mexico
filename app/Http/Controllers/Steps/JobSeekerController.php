<?php

namespace App\Http\Controllers\Steps;

use App\Http\Controllers\Controller;
use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class JobSeekerController extends Controller
{
    public function index()
    {
        return Inertia::render('Steps/Steps');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'job_title' => 'required|string',
            'job_description' => 'required|string',
            'educational_attainment' => 'required|string',
            'job_preference' => 'required|string',
            'hours_per_day' => 'required|numeric',
            'hourly_rate' => 'required|numeric',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'skills' => 'required|array',
            'skills.*.id' => 'required|exists:skills,id',
            'skills.*.rating' => 'required|integer|min:0|max:5',
            'skills.*.description' => 'nullable|string',
            'skills.*.experience' => 'nullable|string'
        ]);

        $user = Auth::user();
        $profile = Jobseeker::updateOrCreate(
            ['user_id' => $user->id],  // Find by user_id
            $data  // Update or create with validated data
        );

        $skillsWithPivotData = [];
        foreach ($data['skills'] as $skillData) {
            $skillsWithPivotData[$skillData['id']] = [
                'rating' => $skillData['rating'],
                'description' => $skillData['description'],
                'experience' => $skillData['experience'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $profile->skills()->sync($skillsWithPivotData);

        return to_route('profile.summary', ['profile' => $profile->id]);
    }
}
