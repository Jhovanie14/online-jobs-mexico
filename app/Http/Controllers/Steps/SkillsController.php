<?php

namespace App\Http\Controllers\Steps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        // Fetch categories with skills
        $categories = Category::with('skills')->get();


        return inertia('Steps/Steps', [
            'category' => $categories,
        ]);
    }
    public function search(Request $request)
    {
        $searchQuery = $request->query('query', '');

        // Fetch categories with skills and filter by search query
        // $categories = Category::whereHas('skills', function ($query) use ($searchQuery) {
        //     $query->where('name', 'like', "%{$searchQuery}%");
        // })
        //     ->with(['skills' => function ($query) use ($searchQuery) {
        //         $query->where('name', 'like', "%{$searchQuery}%"); // Only return matching skills
        //     }])
        //     ->orWhere('name', 'like', "%{$searchQuery}%")
        //     ->get();
        $skills = Skill::where('name', 'like', "%{$searchQuery}%")
            ->with('category') // Load the category for each skill
            ->get();


        return response()->json(['skills' => $skills]); // Return as JSON
    }
}
