<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class ProjectController extends Controller
{
    use FileTraits;
    public function index()
    {
        try {
            $projects = Project::with('category')->get();
            foreach ($projects as $project) {
                $project->image_path = $this->image_path($project->image_path);
            }
            // dd($projects->toArray());
            return view('Dashboard.project.projects', compact('projects'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function create()
    {
        try {
            $projects = Project::all();
            $categories = ServiceCategory::all();
            $status = Project::STATUS;
            return view('Dashboard.project.create_project', compact('projects', 'categories', 'status'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|integer|exists:service_categories,id',
                // 'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|string',
                'start_date' => 'required|date',
                'location' => 'required|string|max:255',
                'status' => 'required|in:ongoing,completed,pending',
            ]);

            if ($request->hasFile('image_path')) {
                $imageUrl = $this->uploadImage($request->file('image_path'), 'uploads');
                $data['image_path'] = $imageUrl;
            }

            $project = Project::create($data);
            return redirect()->route('projects.index')->with('success', 'Project created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $project = Project::findOrFail($id);
            return view('projects.show', compact('project'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Project not found']);
        }
    }

    public function edit($id)
    {
        try {
            $project = Project::with('category')->with('testimonials')->findOrFail($id);
            // dd($project->toArray());
            $project->image_path = $this->image_path($project->image_path);
            // dd($project->toArray());
            $categories = ServiceCategory::all();
            $status = Project::STATUS;
            return view('Dashboard.project.edit_project', compact('project', 'categories', 'status'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Project not found']);
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'category_id' => 'required|integer|exists:service_categories,id',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'sometimes|required|string',
                'start_date' => 'sometimes|required|date',
                'end_date' => 'sometimes|nullable|date',
                'location' => 'sometimes|required|string|max:255',
                'status' => 'sometimes|required|in:ongoing,completed,pending',
            ]);

            $project = Project::findOrFail($id);

            if ($request->hasFile('image_path')) {
                $this->deleteImage($project->image_path);
                $imageUrl = $this->uploadImage($request->file('image_path'), 'uploads');
                $data['image_path'] = $imageUrl;
            }

            // Check if status is changed to 'completed'
            if ($request->status == 'completed' && $project->status != 'completed') {
                $data['end_date'] = now();
            }

            $project->update($data);
            return redirect()->route('projects.index')->with('success', 'Project updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $this->deleteImage($project->image_path);
            $project->delete();
            return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Project not found']);
        }
    }

    // show opened project
    public function openProjectShow(){
        $projects = Project::where('open_for_contractors', 1)->get();
        // dd($projects->toArray());
        return view('Dashboard.project.open_projects',compact('projects'));
    }

    // view single open project details
    public function viewOpenProject($id){
        $project = Project::with('category')->findOrFail($id);
        // $projects = ProjectFile::with('project')->where('project_id',$id)->get();
        $files = ProjectFile::where('project_id',$id)->get();
        // dd($files->toArray());
        // dd($project->toArray());
        return view('Dashboard.project.open_project_detail',compact('project','files'));
    }
}
