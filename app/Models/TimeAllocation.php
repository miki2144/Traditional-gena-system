<?php
// app/Models/TimeAllocation.php



// app/Models/TimeAllocation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeAllocation extends Model
{
    use HasFactory;

    protected $fillable = ['game_id', 'start_time', 'end_time', 'allocated_minutes', 'description', 'status'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
    

    public function players()
    {
        return $this->belongsToMany(Player::class); // Assuming multiple players can be allocated time
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class); // Assuming each time allocation can be associated with a coach
    }
}
