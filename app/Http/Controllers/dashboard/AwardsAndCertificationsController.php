<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\AwardsAndCertifications;
use App\Models\AwardsFile;
use App\Models\ServiceCategory;
use Exception;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class AwardsAndCertificationsController extends Controller
{
    use FileTraits;
    public function index()
    {
        try {
            $awards = AwardsAndCertifications::with('awards_files')->get();
            return view('Dashboard.award.awards', compact('awards'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to retrieve awards: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $categories = ServiceCategory::all();
            return view('Dashboard.award.create_award', compact('categories'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to load create form: ' . $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $award = AwardsAndCertifications::create($request->all());

            $data = [];

            // Check if the request has any files for the 'image_path' field
            if ($request->hasFile('awards_files')) {
                if (is_array($request->file('awards_files'))) {
                    $i = 0;
                    foreach ($request->file('awards_files') as $file) {
                        $i++;
                        // Use move() method to store the file directly in public/uploads directory
                        $fileName = time() . '-' . $i . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads'), $fileName);

                        // Create the file path
                        $filePathWithIndex = 'uploads/' . $fileName;

                        // Update the $data array with the file path
                        $data['file_path'][] = $filePathWithIndex;

                        // Save the file path to the related database table
                        AwardsFile::create([
                            'award_id' => $award->id,
                            'file_path' => $filePathWithIndex,
                        ]);
                    }
                } else {
                    // Handle the single image file
                    $fileName = time() . '.' . $request->file('awards_files')->getClientOriginalExtension();
                    $request->file('awards_files')->move(public_path('uploads'), $fileName);

                    // Create the file path
                    $filePath = 'uploads/' . $fileName;

                    // Update the $data array with the file path
                    $data['file_path'] = $filePath;

                    // Save the file path to the related database table
                    AwardsFile::create([
                        'award_id' => $award->id,
                        'file_path' => $filePath,
                    ]);
                }
            }

            return redirect()->route('awards.index')->with('success', 'Award created successfully.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to create award: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $award = AwardsAndCertifications::with('awardsFiles')->findOrFail($id);
            return view('awards.show', compact('award'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to retrieve award: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $categories = ServiceCategory::all();
            $award = AwardsAndCertifications::with('awards_files')->findOrFail($id);
            // dd($award);
            return view('Dashboard.award.edit_award', compact('award', 'categories'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to load edit form: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        try {
            $award = AwardsAndCertifications::findOrFail($id);
            $award->update($request->all());

            if ($request->hasFile('awards_files')) {
                foreach ($request->file('awards_files') as $file) {
                    $filePath = $file->store('awards_files');
                    AwardsFile::create([
                        'award_id' => $award->id,
                        'file_path' => $filePath,
                    ]);
                }
            }

            return redirect()->route('awards.index')->with('success', 'Award updated successfully.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to update award: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $award = AwardsAndCertifications::findOrFail($id);
            $award->delete();

            return redirect()->route('awards.index')->with('success', 'Award deleted successfully.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete award: ' . $e->getMessage()]);
        }
    }
}
