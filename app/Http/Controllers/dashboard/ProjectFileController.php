<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\FileTraits;

class ProjectFileController extends Controller
{
    use FileTraits;

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data =  $request->validate([
                'project_id' => 'required|exists:projects,id',
                'file_name' => 'required|string|max:255',
                // 'file_path' => 'nullable|file|max:2048',
                'other_requirements' => 'nullable|string',
            ]);

            if ($request->hasFile('file_path')) {
                $filePath = $this->uploadImage($request->file('file_path'), 'uploads');
                $data['file_path'] = $filePath;
            }

            ProjectFile::create($data);
            return back()->with('success', 'File uploaded successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to upload file: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $file = ProjectFile::findOrFail($id);
        return response()->download(public_path($file->file_path), $file->file_name);
    }

    public function destroy($id)
    {
        $file = ProjectFile::findOrFail($id);
        Storage::disk('public')->delete(str_replace('/storage/', '', $file->file_path));
        $file->delete();

        return back()->with('success', 'File deleted successfully.');
    }
}
