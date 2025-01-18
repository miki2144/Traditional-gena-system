<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Coach;
use App\Models\Team; // Import the Team model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch registered players, coaches, and teams
        $players = Player::with('team')->get();
        $coaches = Coach::all(); // Fetch all coaches
        $teams = Team::all(); // Fetch all teams

        return view('home', compact('players', 'coaches', 'teams')); // Pass teams to the view
    }
}