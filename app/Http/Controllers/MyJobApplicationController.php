<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user(); // the way to stop IDE red colored user

        return view('my_job_application.index', [
            'applications' => $user->jobApplications()->with([
                'job' => fn($q) => $q->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary')->withTrashed(),
                'job.employer'
            ])->latest()->get() ?? collect()
        ]);
    }

    public function destroy(JobApplication $myJobApplication) // here this name is as same as route list param
    {
        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Canceled appling');
    }
}
