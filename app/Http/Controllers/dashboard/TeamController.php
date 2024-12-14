<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Traits\FileTraits;
use Exception;

class TeamController extends Controller
{
    use FileTraits;
    public function index()
    {
        $teams = Team::all();
        return view('Dashboard.teams.teams', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Team::POSITION;
        return view('Dashboard.teams.create_team', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'bio' => 'nullable|string',
                'photo_path' => 'nullable',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'linkedin_profile' => 'nullable|string|max:255',
                // 'status' => 'nullable|boolean',
            ]);

            // dd($data);
            if ($request->hasFile('photo_path')) {
                $imageUrl = $this->uploadImage($request->file('photo_path'), 'uploads');
                $data['photo_path'] = $imageUrl;
            }

            Team::create($data);

            return redirect()->route('teams.index')->with('success', 'Team member created successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error creating team member.' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $positions = Team::POSITION;
        return view('Dashboard.teams.edit_team', compact('positions', 'team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        // dd($team->toArray());
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo_path' => 'nullable|',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'linkedin_profile' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('photo_path')) {
            $this->deleteImage($team->photo_path);
            $imageUrl = $this->uploadImage($request->file('photo_path'), 'uploads');
            $data['photo_path'] = $imageUrl;
        }

        $team->update($data);

        return redirect()->route('teams.index')->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team member deleted successfully.');
    }
}
