<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyStat extends Model {
    protected $fillable = ['month','player_id','kills','assists','damage','survived_minutes','rescues','call_back','score','mvp_count','coffee_breaks','matches_played'];
    public function player() { return $this->belongsTo(Player::class); }
}
