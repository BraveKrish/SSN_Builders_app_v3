<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class ServiceController extends Controller
{
    use FileTraits;
    public function index()
    {
        try {
            $services = Service::with('category')->with('children')->get();

            foreach($services as $service){
                $fullPath = $this->image_path($service->image);
                $service->fullPath = $fullPath;
            }

            return response()->json($services);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function show($id)
    {
        try {
            $service = Service::with('category')->findOrFail($id);
            $service->fullPath = $this->image_path($service->image);
            // dd($service);

            return response()->json($service);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Service not found'], 404);
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                // 'slug' => 'required|string|unique:services,slug',
                'description' => 'required|string',
                'category_id' => 'required|exists:service_categories,id',
            ]);

            $service = Service::create($data);
            return response()->json($service, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = $request->validate([
                'title' => 'sometimes|required|string|max:255',
                // 'slug' => 'sometimes|required|string|unique:services,slug,' . $id,
                'description' => 'sometimes|required|string',
                'category_id' => 'sometimes|required|exists:service_categories,id',
            ]);

            $service = Service::findOrFail($id);
            $service->update($request->all());
            return response()->json($service);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();
            return response()->json(['message' => 'Service deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Service not found'], 404);
        }
    }
}
