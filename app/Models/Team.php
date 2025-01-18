<?php
// app/Models/Team.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'coach_id','founded_year'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class, 'home_team_id') // Games where this team is the home team
            ->orWhere('away_team_id', $this->id); // Games where this team is the away team
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}