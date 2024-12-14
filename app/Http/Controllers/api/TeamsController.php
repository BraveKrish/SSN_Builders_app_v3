<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class TeamsController extends Controller
{
    use FileTraits;
    public function getTeams(){
        try {
            $teams = Team::where('status',1)->get();
            foreach ($teams as $team) {
                    $imageUrl = $this->image_path($team->photo_path);
                    $team->photo_path = $imageUrl;
            }
            // dd($teams->toArray());
            return response()->json($teams);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', $e->getMessage()], 500);
        }
    }
}
