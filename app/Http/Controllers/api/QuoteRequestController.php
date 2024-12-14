<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Quotes;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class QuoteRequestController extends Controller
{
    use FileTraits;
    public function submitQuoteRequest(Request $request)
    {
        // dd($request->all());
        try {
            // Validate the incoming request data
            $data = $request->validate([
                'name' => 'required|string|max:255',
                // 'slug' => 'nullable|string|max:255|unique:quote_requests,slug',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'project_name' => 'required|string|max:255',
                'project_location' => 'required|string|max:255',
                'project_category' => 'required|string|max:100',
                'total_estimate' => 'nullable|numeric',
                'submission_date' => 'required|date'
            ]);

            // Handle file upload for project details if provided
            if ($request->hasFile('project_details_file')) {
                $filePath = $this->uploadImage($request->file('project_details_file'), 'uploads/Quotes/ResponsFile');
                $data['project_details_file'] = $filePath;
            }

            // Create a new quote request record
            $quoteRequest = Quotes::create($data);

            // Return a JSON response
            return response()->json([
                'success' => true,
                'message' => 'Quote request submitted successfully',
                'data' => $quoteRequest
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting the quote request.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
