<?php

namespace App\Http\Controllers;

use App\Models\MyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', MyJob::class);

        $filters = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category');

        return view('jobs.index', ['jobs' => MyJob::with('employer')->latest()->filter($filters)->get()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MyJob $job)
    {
        Gate::authorize('view', $job);
        return view('jobs.show', ['job' => $job->load('employer.jobs')]);
    }
}
