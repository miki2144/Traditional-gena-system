<?php
// app/Http/Controllers/TeamController.php
namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Coach; // Add the Coach model if needed
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Display a listing of the teams
    public function index()
    {
        $teams = Team::all(); // Fetch all teams
        return view('teams.index', compact('teams')); // Return the 'index' view with the teams
    }

    // Show the form for creating a new team
    public function create()
    {
        $coaches = Coach::all(); // Get all coaches for the dropdown
        return view('teams.create', compact('coaches')); // Return the 'create' view with coaches
    }

    // Store a newly created team in the database
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'coach_id' => 'nullable|exists:coaches,id', // Ensure the coach exists
            'founded_year' => 'nullable|integer|digits:4', // Year should be a 4-digit integer
        ]);

        // Create the team and save it to the database
        Team::create($request->all());

        // Redirect to the teams list page with a success message
        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    // Show the form for editing the specified team
    public function edit($id)
    {
        $team = Team::findOrFail($id); // Find the team
        $coaches = Coach::all(); // Get all coaches for the dropdown
        return view('teams.edit', compact('team', 'coaches')); // Return the 'edit' view with the team and coaches
    }

    // Update the specified team in the database
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id); // Find the team by ID

        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'coach_id' => 'nullable|exists:coaches,id', // Ensure the coach exists
            'founded_year' => 'nullable|integer|digits:4', // Year should be a 4-digit integer
        ]);

        // Update the team with the new data
        $team->update($request->all());

        // Redirect to the teams list page with a success message
        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    // Remove the specified team from storage
    public function destroy($id)
    {
        $team = Team::findOrFail($id); // Find the team by ID
        $team->delete(); // Delete the team

        // Redirect to the teams list page with a success message
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }
}
