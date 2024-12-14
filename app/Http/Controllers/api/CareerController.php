<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobListing;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class CareerController extends Controller
{
    use FileTraits;
    public function allCareers(){
        try {
            $careers = JobListing::all();
            return response()->json($careers);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function GetById($id){
        try{
        $career = JobListing::findOrFail($id);
        return response()->json($career);
        }catch(\Exception $e){
            return response()->json(['error' => 'Unable to get Career'], 500);
        }
    }

    public function GetBySlug($slug)
    {
        // $post = $slug;
        $slug = strtolower($slug);
        $career = JobListing::where('slug', $slug)->first();

        if (!$career) {
            return response()->json(['message' => 'Jobs not found'], 404);
        }

        return response()->json(['career' => $career, 'slug' => $slug]);
    }

    public function applyJob(Request $request)
    {
        // dd($request->all());
        try {
            // Validate the incoming request data
            $data = $request->validate([
                'job_id' => 'nullable', 
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'resume_url' => 'nullable',
                'application_date' => 'required|date',
            ]);
    

            if($request->hasFile('resume_url')){
                $resumePath = $this->uploadImage($request->file('resume_url'), 'uploads/ResumeFile');
                $data['resume_url'] = $resumePath;
            }

             // Create a new job application entry
             $jobApplication = Application::create($data);
    
            // Prepare response data
            $response = [
                'message' => 'Job application submitted successfully',
                'application' => $jobApplication,
                'path' => $resumePath
            ];
    
            return response()->json($response, 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
    
        } catch (\Exception $e) {
            // Handle other errors
            return response()->json([
                'message' => 'An error occurred while submitting the application',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
}
