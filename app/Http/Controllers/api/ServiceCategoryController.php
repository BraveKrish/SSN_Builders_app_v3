<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = ServiceCategory::with('children')->whereNull('parent_id')->get();
            return response()->json($categories);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function show($id)
    {
        try {
            $category = ServiceCategory::with('children')->findOrFail($id);
            return response()->json($category);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|unique:service_categories,slug',
                'parent_id' => 'nullable|exists:service_categories,id',
            ]);

            $category = ServiceCategory::create($request->all());
            return response()->json($category, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'slug' => 'sometimes|required|string|unique:service_categories,slug,' . $id,
                'parent_id' => 'nullable|exists:service_categories,id',
            ]);

            $category = ServiceCategory::findOrFail($id);
            $category->update($request->all());
            return response()->json($category);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $category = ServiceCategory::findOrFail($id);
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
