<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyStat extends Model {
    protected $fillable = ['date','player_id','kills','assists','damage','survived_minutes','rescues','call_back','score','mvp_count','coffee_breaks','played'];
    public function player() { return $this->belongsTo(Player::class); }
}
