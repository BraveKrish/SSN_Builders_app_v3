<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class ProjectController extends Controller
{
    use FileTraits;
    public function index(){
        $projects = Project::with('category')
        ->with('testimonials')
        ->get();
        // dd($projects);
        foreach($projects as $project){
            $fullUrl = $this->image_path($project->image_path);
            $project->fullPath = $fullUrl;
        }
        return response()->json($projects);
    }

    public function getProjectBySlug($slug)
    {
        // Fetch the project by slug
        $project = Project::with('category', 'testimonials')
            ->where('slug', $slug)
            ->firstOrFail(); // Throws 404 if not found

        // Generate the full image URL
        $fullUrl = $this->image_path($project->image_path);
        $project->fullUrl = $fullUrl;

        // Return the project as a JSON response
        return response()->json($project);
    }

    public function getProjectById($id)
    {
        // Fetch the project by ID
        $project = Project::with('category', 'testimonials')
            ->where('id', $id)
            ->firstOrFail(); // Throws 404 if not found

        // Generate the full image URL
        $fullUrl = $this->image_path($project->image_path);
        $project->fullUrl = $fullUrl;

        // Return the project as a JSON response
        return response()->json($project);
    }
}
