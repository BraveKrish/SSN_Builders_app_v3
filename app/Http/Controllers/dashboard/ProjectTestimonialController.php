<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProjectTestimonial;
use Illuminate\Http\Request;

class ProjectTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $testimonials = ProjectTestimonial::all();
            return view('project_testimonials.index', compact('testimonials'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function create()
    {
        return view('project_testimonials.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'project_id' => 'required|exists:projects,id',
                'client_information' => 'required|string|max:255',
                'testimonial' => 'required|string',
                'status' => 'required|string',
            ]);

            $testimonial = ProjectTestimonial::create($request->all());
            return redirect()->route('project_testimonials.index')->with('success', 'Testimonial created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function show($id)
    {
        try {
            $testimonial = ProjectTestimonial::findOrFail($id);
            return view('project_testimonials.show', compact('testimonial'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Testimonial not found']);
        }
    }

    public function edit($id)
    {
        try {
            $testimonial = ProjectTestimonial::findOrFail($id);
            return view('project_testimonials.edit', compact('testimonial'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Testimonial not found']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'project_id' => 'sometimes|required|exists
                ,id',
                'client_information' => 'sometimes|required|string|max:255',
                'testimonial' => 'sometimes|required|string',
                'status' => 'required|string',
            ]);

            $testimonial = ProjectTestimonial::findOrFail($id);
            $testimonial->update($data);
            return redirect()->route('project_testimonials.index')->with('success', 'Testimonial updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $testimonial = ProjectTestimonial::findOrFail($id);
            $testimonial->delete();
            return redirect()->route('project_testimonials.index')->with('success', 'Testimonial deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Testimonial not found']);
        }
    }
}
