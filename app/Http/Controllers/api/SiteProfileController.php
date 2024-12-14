<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SiteProfile;
use Illuminate\Http\Request;

class SiteProfileController extends Controller
{
    public function siteProfile(){
        $profile = SiteProfile::first();
        return response()->json($profile);
    }
}
