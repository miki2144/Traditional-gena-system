<?php

namespace App\Http\Controllers;

use App\Models\Game; // Renamed from Match to Game
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        // Fetch games with related teams
        $games = Game::with(['homeTeam', 'awayTeam'])->get();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        // Fetch all teams for the dropdown
        $teams = Team::all();
        return view('games.create', compact('teams'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'game_time' => 'required|date',
            'location' => 'nullable|string|max:255',
            'score_home' => 'nullable|integer',
            'score_away' => 'nullable|integer',
        ]);

        // Create a new game
        Game::create($request->all());

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }

    public function edit($id)
    {
        $game = Game::with(['homeTeam', 'awayTeam'])->findOrFail($id);
        $teams = Team::all();
        return view('games.edit', compact('game', 'teams'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        // Validate request data
        $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'game_time' => 'required|date',
            'location' => 'nullable|string|max:255',
            'score_home' => 'nullable|integer',
            'score_away' => 'nullable|integer',
        ]);

        // Update the game
        $game->update($request->all());

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }
}