<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */

    public function dashboard()
    {
        $jobs = JobPosting::latest()->take(10)->get()->map(function ($job) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'company_name' => $job->company_name,
'company_logo' => asset('storage/' . $job->company_logo),
                'location' => $job->location,
                'experience' => $job->experience,
                'salary' => $job->salary,
                'description' => $job->description,
                'skills' => ($job->skills),
                'extra' => ($job->extra),
                'created_at' => $job->created_at->diffForHumans(),
            ];
        });

        return Inertia::render('Dashboard', [
            'jobs' => $jobs,
        ]);
    }

}
