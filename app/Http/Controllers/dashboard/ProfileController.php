<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\SiteProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function showProfile(){
        $profile = SiteProfile::first();
        // dd($profile);
        return view('Dashboard.profile.show_profile',compact('profile'));
    }


    public function updateSiteProfile(Request $request){
        // dd($request->all());
        $validatedData = $request->validate([
            'about_us' => 'required|string',
            'contact_no' => 'required|string',
            'email' => 'required|email',
            'secondary_email' => 'nullable|email',
            'location' => 'required|string',
            'facebook_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
        ]);

        // Retrieve the first record or create a new one if none exists
        $siteInfo = SiteProfile::firstOrNew([]);
        $siteInfo->fill($validatedData);
        $siteInfo->save();

        return redirect()->back()->with('success', 'Site information updated successfully!');
    }

   
}
