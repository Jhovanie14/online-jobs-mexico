<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureSkillsCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Ensure user is logged in
        if (!$user || !$user->profile) {
            return redirect()->route('skills.index')->with('error', 'Please complete your skills before proceeding.');
        }

        $profile = $user->profile;
        $skillsIncomplete = empty($profile->job_title) || empty($profile->job_description);

        // If skills are incomplete, prevent access to the dashboard
        if ($skillsIncomplete && $request->routeIs('dashboard')) {
            return redirect()->route('skills.index')->with('error', 'Complete your skills before accessing the dashboard.');
        }

        // If skills are complete, prevent access to skills.index
        if (!$skillsIncomplete && $request->routeIs('skills.index')) {
            return redirect()->route('dashboard')->with('error', 'You have already completed your skills setup.');
        }
        return $next($request);
    }
}
