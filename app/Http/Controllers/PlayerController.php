<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('team')->get();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'age' => 'nullable|integer',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('players', 'public');
        }
    
        Player::create([
            'name' => $request->name,
            'position' => $request->position,
            'team_id' => $request->team_id,
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'image' => $path,
        ]);
    
        return redirect()->route('players.index')->with('success', 'Player registered successfully!');
    }
    
    public function edit($id)
    {
        $player = Player::with('team')->findOrFail($id);
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'team_id' => 'required|exists:teams,id',
            'age' => 'nullable|integer|min:0',
            'height' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($player->image) {
                Storage::disk('public')->delete($player->image);
            }
            $imagePath = $request->file('image')->store('players', 'public');
        } else {
            $imagePath = $player->image; // Keep existing image
        }

        $player->update(array_merge($request->all(), ['image' => $imagePath]));

        return redirect()->route('players.index')->with('success', 'Player updated successfully.');
    }

    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        
        // Delete image if it exists
        if ($player->image) {
            Storage::disk('public')->delete($player->image);
        }
        
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player deleted successfully.');
    }
}