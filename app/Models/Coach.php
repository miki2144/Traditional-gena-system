<?php
// app/Models/Coach.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email','image', 'password', 'age', 'specialization', 'phone'];

    // Relationship with Team
    public function teams()
    {
        return $this->hasMany(Team::class); // Assuming a coach can have multiple teams
    }
}