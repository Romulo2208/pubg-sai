<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name'];

    public function dailyStats()   { return $this->hasMany(DailyStat::class); }
    public function weeklyStats()  { return $this->hasMany(WeeklyStat::class); }
    public function monthlyStats() { return $this->hasMany(MonthlyStat::class); }
}
