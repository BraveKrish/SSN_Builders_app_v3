<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with('job')->get();
        return view('applications.index', compact('applications'));
    }

    // Show the form for creating a new application
    public function create(JobListing $job)
    {
        return view('applications.create', compact('job'));
    }

    // Store a newly created application in the database
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
            'resume_url' => 'required|string|max:255',
            'application_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Application::create($request->all());

        return redirect()->route('applications.index')->with('success', 'Application submitted successfully.');
    }

    // Display the specified application
    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }

    // Show the form for editing the specified application
    public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }

    // Update the specified application in the database
    public function update(Request $request, Application $application)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
            'resume_url' => 'required|string|max:255',
            'application_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $application->update($request->all());

        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    // Remove the specified application from the database
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }

    public function allApplications(JobListing $job)
    {
        // dd($job->toArray());
        $id = $job->id;
        $applications = Application::with('job')->where('job_id', $id)->get();
        // dd($applications->toArray());
        return view('Dashboard.job.applications', compact('applications'));
    }

    public function showReply($id){
        $application = Application::findOrFail($id);
        // dd($application);
        return view('Dashboard.job.application-reply',compact('application'));
    }

    public function sendReply(Request $request){
        // dd($request->all());
        try {
            // Validate the incoming request data
            $request->validate([
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
                'attachments' => 'nullable|array',
                'attachments.*' => 'file|mimes:jpeg,png,pdf,doc,docx,txt', 
            ]);
    
            // Extract the email, subject, and message from the request
            $recipientEmail = $request->input('email');
            $subject = $request->input('subject');
            $message = $request->input('message');
    
            // Prepare the email content
            $emailContent = [
                'subject' => $subject,
                'message' => $message,
            ];
    
              // Send the email using Mail facade with HTML content
              Mail::html($message, function ($mail) use ($recipientEmail, $subject, $request) {
                $mail->to($recipientEmail)
                    ->subject($subject);
    
                // Attach files if provided
                if ($request->hasFile('attachments') && is_array($request->file('attachments'))) {
                    foreach ($request->file('attachments') as $attachment) {
                        $mail->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(),
                            'mime' => $attachment->getMimeType(),
                        ]);
                    }
                }
            });
    
            $application = Application::findOrFail($request->id);
            $application->status = 'responded';
            $application->save();
    
            return redirect()->route('jobs.index')->with('success', 	"Reply to job application sent successfully!");
    
        } catch (\Exception $e) {
            return redirect()->route('jobs.index')
            ->with('error', 'Failed to send email. Please try again later. Error: ' . $e->getMessage());
        }
    }

    public function showJobApplications(){
        $applications = Application::with('job')->get();
        // dd($applications->toArray());
        return view('Dashboard.applications.all_applications', compact('applications'));
    }

   
}
