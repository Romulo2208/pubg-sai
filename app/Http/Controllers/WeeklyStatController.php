<?php
namespace App\Http\Controllers;

use App\Models\MatchPlayer;
use Illuminate\Http\Request;

class WeeklyStatController extends Controller {
    public function index()
    {
        $stats = MatchPlayer::join('players', 'players.id', '=', 'match_players.player_id')
            ->selectRaw('players.name as player_name, ' .
                'SUM(match_players.kills) as kills, ' .
                'SUM(match_players.assists) as assists, ' .
                'SUM(match_players.damage) as damage, ' .
                'SUM(match_players.survived) as survived_minutes, ' .
                'SUM(match_players.rescue) as rescues, ' .
                'SUM(match_players.recall) as call_back, ' .
                'SUM(match_players.score) as score, ' .
                'SUM(match_players.mvp) as mvp_count, ' .
                'SUM(match_players.coffee) as coffee_breaks, ' .
                'SUM(match_players.played) as matches_played')
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
