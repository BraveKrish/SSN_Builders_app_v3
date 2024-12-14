<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\DemoMail;
use App\Models\JobListing;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::all();
        return view('Dashboard.job.jobs', compact('jobs'));
    }

    // Show the form for creating a new job
    public function create()
    {
        $jobTypes = JobListing::JOB_TYPE;
        $jobCategories = JobListing::JOB_CATEGORY;
        $levels = JobListing::LEVEL;
        $status = JobListing::STATUS;
        return view('Dashboard.job.create_job', compact('jobTypes', 'jobCategories', 'levels', 'status'));
    }

    // Store a newly created job in the database
    public function store(Request $request)
    {
        // dd($request->all());
        // $mailData = 
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'job_type' => 'required|string',
                'job_category' => 'required|string',
                'posted_date' => 'required|date',
                'location' => 'required|string',
                'application_deadline' => 'required|date',
                'level' => 'required|string',
                'status' => 'required|string',
            ]);

            $mailData = JobListing::create($data);
            // dd($result->toArray());
            Mail::to('krish.demo.job@gmail.com')->send(new DemoMail($mailData));

            // dd('Email sent successfully');

            return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the job. Please try again.']);
        }
    }

    // Display the specified job
    public function show(JobListing $job)
    {
        return view('jobs.show', compact('job'));
    }

    // Show the form for editing the specified job
    public function edit(JobListing $job)
    {
        $jobTypes = JobListing::JOB_TYPE;
        $jobCategories = JobListing::JOB_CATEGORY;
        $levels = JobListing::LEVEL;
        $status = JobListing::STATUS;
        return view('Dashboard.job.edit_job', compact('job', 'jobTypes', 'jobCategories', 'levels', 'status'));
    }

    // Update the specified job in the database
    public function update(Request $request, JobListing $job)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'job_type' => 'required|string',
                'job_category' => 'required|string',
                'posted_date' => 'required|date',
                'location' => 'required|string',
                'application_deadline' => 'required|date',
                'level' => 'required|string',
                'status' => 'required|string',
            ]);

            $job->update($data);

            return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the job. Please try again.']);
        }
    }

    // Remove the specified job from the database
    public function destroy(JobListing $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
