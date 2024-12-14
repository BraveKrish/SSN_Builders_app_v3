<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AwardsAndCertifications;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class AwardsController extends Controller
{
    use FileTraits;
    public function allAwards(){
        try {
            $awards = AwardsAndCertifications::with('awards_files')->get();
            foreach ($awards as $award) {
                foreach ($award->awards_files as $file) {
                    $imageUrl = $this->image_path($file->file_path);
                    $file->full_image = $imageUrl;
                }
            }
            // dd($awards->toArray());
            return response()->json($awards);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    // public function GetById($id){
    //     try{
    //     $career = AwardsAndCertifications::findOrFail($id);
    //     return response()->json($career);
    //     }catch(\Exception $e){
    //         return response()->json(['error' => 'Unable to get Career'], 500);
    //     }
    // }

    // public function GetBySlug($slug)
    // {
    //     // $post = $slug;
    //     $slug = strtolower($slug);
    //     $career = AwardsAndCertifications::where('slug', $slug)->first();

    //     if (!$career) {
    //         return response()->json(['message' => 'Jobs not found'], 404);
    //     }

    //     return response()->json(['career' => $career, 'slug' => $slug]);
    // }
}
