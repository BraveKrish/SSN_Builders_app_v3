<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class TestimonialController extends Controller
{
    use FileTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $testimonials = Testimonial::all();
            foreach ($testimonials as $testimonial) {
                $testimonial->photo_path = $this->image_path($testimonial->photo_path);
            }
            return view('Dashboard.testimonial.testimonials', compact('testimonials'));
        } catch (Exception $e) {
            return redirect()->route('testimonials.index')->with('error', 'Failed to retrieve testimonials: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Testimonial::POSITION;
        return view('Dashboard.testimonial.create_testimonial', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'client_name' => 'required|string|max:255',
                'position' => 'nullable|string|max:255',
                'client_company' => 'nullable|string|max:255',
                'photo_path' => 'nullable|',
                'testimonial_text' => 'required|',
                // 'rating' => 'required|integer|min:1|max:5',
                // 'status' => 'required|boolean',
            ]);

            if ($request->hasFile('photo_path')) {
                $photoUrl = $this->uploadImage($request->file('photo_path'), 'uploads');
                $data['photo_path'] = $photoUrl;
            }

            Testimonial::create($data);

            return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
        } catch (Exception $e) {
            return redirect()->route('testimonials.create')->with('error', 'Failed to create testimonial: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        try {
            return view('testimonials.show', compact('testimonial'));
        } catch (Exception $e) {
            return redirect()->route('testimonials.index')->with('error', 'Failed to retrieve testimonial: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        try {
            $positions = Testimonial::POSITION;
            // dd($testimonial->toArray());
            $testimonial->photo_path = $this->image_path($testimonial->photo_path);
            return view('Dashboard.testimonial.edit_testimonial', compact('testimonial', 'positions'));
        } catch (Exception $e) {
            return redirect()->route('testimonials.index')->with('error', 'Failed to retrieve testimonial for editing: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        // dd($request->all());
        try {
            $validatedData = $request->validate([
                'client_name' => 'required|string|max:255',
                'position' => 'nullable|string|max:255',
                'client_company' => 'nullable|string|max:255',
                'photo_path' => 'nullable|image',
                'testimonial_text' => 'required|string',
                'status' => 'required|boolean',
            ]);

            if ($request->hasFile('photo_path')) {
                $this->deleteImage($testimonial->photo_path);
                $photoURl = $this->uploadImage($request->file('photo_path'), 'uploads');
                $validatedData['photo_path'] = $photoURl;
            }

            $testimonial->update($validatedData);

            return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('testimonials.edit', $testimonial->id)->with('error', 'Failed to update testimonial: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            $testimonial->delete();

            return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('testimonials.index')->with('error', 'Failed to delete testimonial: ' . $e->getMessage());
        }
    }
}
