<?php

namespace App\Http\Controllers;

use App\Models\MyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{
    public function create(MyJob $Job)
    {
        Gate::authorize('apply', $Job);
        return view('job_application.create', ['job' => $Job]);
    }

    public function store(MyJob $job, Request $request)
    {
        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|max:1000000|min:1'
            ])
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Job Application submitted.');
    }

    public function destroy(string $id)
    {
        //
    }
}
