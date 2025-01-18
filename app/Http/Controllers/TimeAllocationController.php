<?php


namespace App\Http\Controllers;

use App\Models\TimeAllocation;
use App\Models\Game; // Updated from Match to Game
use Illuminate\Http\Request;

class TimeAllocationController extends Controller
{
    // public function index()
    // {
    //     // Fetch time allocations with the related game
    //     $timeAllocations = TimeAllocation::with('game')->get();
    //     return view('time_allocations.index', compact('timeAllocations'));
    // }
    public function index()
{
    // Fetch time allocations with the related game, homeTeam, and awayTeam
    $timeAllocations = TimeAllocation::with('game.homeTeam', 'game.awayTeam')->get();
    return view('time_allocations.index', compact('timeAllocations'));
}


    public function create()
    {
        // Fetch all games for the dropdown
        $games = Game::all();
        return view('time_allocations.create', compact('games'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'game_id' => 'required|exists:games,id', // Updated from match_id to game_id
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'allocated_minutes' => 'nullable|integer|min:0',
            'description' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:pending,approved,rejected',
        ]);

        // Create a new time allocation
        TimeAllocation::create($request->all());

        return redirect()->route('time_allocations.index')->with('success', 'Time allocation created successfully.');
    }

    public function edit($id)
    {
        $timeAllocation = TimeAllocation::findOrFail($id);
        $games = Game::all();
        return view('time_allocations.edit', compact('timeAllocation', 'games'));
    }

    public function update(Request $request, $id)
    {
        $timeAllocation = TimeAllocation::findOrFail($id);

        // Validate the request
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'allocated_minutes' => 'nullable|integer|min:0',
            'description' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:pending,approved,rejected',
        ]);

        // Update the time allocation
        $timeAllocation->update($request->all());

        return redirect()->route('time_allocations.index')->with('success', 'Time allocation updated successfully.');
    }

    public function destroy($id)
    {
        $timeAllocation = TimeAllocation::findOrFail($id);
        $timeAllocation->delete();

        return redirect()->route('time_allocations.index')->with('success', 'Time allocation deleted successfully.');
    }
}
