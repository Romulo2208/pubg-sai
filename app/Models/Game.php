<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
    protected $table = 'matches';
    protected $fillable = ['date'];
    public function playerStats() { return $this->hasMany(MatchPlayer::class); }
}
