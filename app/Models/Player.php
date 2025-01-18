<?php
// app/Models/Player.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position', 'team_id', 'age', 'height', 'weight', 'image'];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class); // Assuming a player can participate in multiple games
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class); // Assuming each player has a coach
    }
}