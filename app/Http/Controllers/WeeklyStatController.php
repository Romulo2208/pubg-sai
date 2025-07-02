<?php
namespace App\Http\Controllers;

use App\Models\WeeklyStat;
use Illuminate\Http\Request;

class WeeklyStatController extends Controller {
    public function index()
    {
        $stats = WeeklyStat::join('players', 'players.id', '=', 'weekly_stats.player_id')
            ->selectRaw('players.name as player_name, ' .
                'SUM(weekly_stats.kills) as kills, ' .
                'SUM(weekly_stats.assists) as assists, ' .
                'SUM(weekly_stats.damage) as damage, ' .
                'SUM(weekly_stats.survived_minutes) as survived_minutes, ' .
                'SUM(weekly_stats.rescues) as rescues, ' .
                'SUM(weekly_stats.call_back) as call_back, ' .
                'SUM(weekly_stats.score) as score, ' .
                'SUM(weekly_stats.mvp_count) as mvp_count, ' .
                'SUM(weekly_stats.coffee_breaks) as coffee_breaks, ' .
                'SUM(weekly_stats.matches_played) as matches_played')
            ->groupBy('players.name')
            ->orderBy('players.name')
            ->get();

        return view('weekly-stats.index', compact('stats'));
    }
    public function create() {
        return view('weekly-stats.create');
    }
    public function store(Request $request) {
        // handle import...
    }
    // other resource methods...
}
