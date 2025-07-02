<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class MatchPlayer extends Model {
    protected $table = 'match_players';
    protected $fillable = [
        'match_id',
        'player_id',
        'kills',
        'assists',
        'damage',
        'survived',
        'rescue',
        'recall',
        'score',
        'mvp',
        'coffee',
        'played'
    ];
    protected $casts = [
        'survived' => 'float',
        'coffee' => 'boolean',
        'mvp' => 'boolean',
        'played' => 'boolean',
    ];

    public function match() { return $this->belongsTo(Game::class, 'match_id'); }
    public function player() { return $this->belongsTo(Player::class); }
}
