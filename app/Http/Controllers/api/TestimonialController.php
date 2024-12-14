<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class TestimonialController extends Controller
{
    use FileTraits;

    public function index(){
        $testimonails = Testimonial::where('status',1)->get();
        // dd($testimonails->toArray());
        foreach($testimonails as $testimonail){
            $fullPath = $this->image_path($testimonail->photo_path);
            $testimonail->fullPath = $fullPath;
        }
        // $response = [
        //     'data' => $testimonails,
        //     'staus' => 200

        // ];
        return response()->json($testimonails, 200);
    }
}
