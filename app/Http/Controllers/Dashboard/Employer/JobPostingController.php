<?php

namespace App\Http\Controllers\Dashboard\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class JobPostingController extends Controller
{
    public function create()
    {
        $skills = Skill::all();

        return Inertia::render('Dashboard/Employer/JobPost', ['skills' => $skills]);
    }
    public function search(Request $request)
    {
        $searchQuery = $request->query('query', '');

        $skills = Skill::where('name', 'like', "%{$searchQuery}%")
            ->with('category') // Include category details
            ->get();

        return response()->json(['skills' => $skills]); // Return JSON response
    }
    public function storeJob(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'employment_type' => 'required',
            'job_description' => 'required',
            'salary' => 'required|numeric',
            'desired_hours_per_week' => 'required|numeric',
            'status' => 'pending', // Ensure status is set
            'skills' => 'required|array|max:3',
        ]);

        $employer = Auth::user()->employer;

        if (!$employer) {
            return back()->withErrors(['error', 'Unauthorized. Only employers can post jobs.']);
        }

        $job = JobPost::create([
            'employer_id' => $employer->id, // Ensure this is being set!
            'job_title' => $request->job_title,
            'employment_type' => $request->employment_type,
            'job_description' => $request->job_description,
            'salary' => $request->salary,
            'desired_hours_per_week' => $request->desired_hours_per_week,
        ]);
        // $job->skills()->sync($request->skills); // Attach skills
        $job->skills()->sync(collect($request->skills)->pluck('id'));


        return redirect()->route('employer.jobPost')->with('success', 'Job Posted Successfully!');
    }
    public function show()
    {

        $employer = Auth::user()->employer;

        $jobPosts = JobPost::where('employer_id', $employer->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Dashboard/Employer/JobPosted', [
            'jobPosts' => $jobPosts // ✅ Make sure this is an array of jobs
        ]);
    }
}
