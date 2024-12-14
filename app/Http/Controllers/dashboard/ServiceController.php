<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Exception;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class ServiceController extends Controller
{
    use FileTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $services = Service::with('category')->get();

            return view('Dashboard.service.services', compact('services'));
        } catch (Exception $e) {
            return back()->with('error', 'Failed to retrieve services');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ServiceCategory::all();
        return view('Dashboard.service.create_service', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'title' => 'required|string',
                'image' => 'required|',
                'description' => 'required|string',
                'category_id' => 'required|integer|exists:service_categories,id',
            ]);

            if($request->hasFile('image')){
                $imageUrl = $this->uploadImage($request->file('image'),'uploads/services');
                $data['image'] = $imageUrl;
            }

            Service::create($data);
            return redirect()->route('services.index')->with('success', 'Service created successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = ServiceCategory::all();
        return view('Dashboard.service.edit_service', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::with('category')->find($id);
        // dd($service->toArray());
        $categories = ServiceCategory::all();
        return view('Dashboard.service.edit_service', compact('categories', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'title' => 'required|string',
                'image' => 'required',
                'description' => 'required|string',
                'category_id' => 'required|integer|exists:service_categories,id',
            ]);

            $service = Service::findorFail($id);

            if($request->hasFile('image')){
                $this->deleteImage($service->image);
                $imageUrl = $this->uploadImage($request->file('image'),'uploads/services');
                $data['image'] = $imageUrl;
            }


            $service->update($data);
            return redirect()->route('services.index')->with('success', 'Service updated successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $service = Service::findorFail($id);
            $this->deleteImage($service->image);
            return redirect()->route('services.index')->with('success', 'Service deleted successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
