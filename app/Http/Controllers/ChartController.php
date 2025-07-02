<?php
namespace App\Http\Controllers;

use App\Models\MatchPlayer;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $data = MatchPlayer::join('players', 'players.id', '=', 'match_players.player_id')
            ->selectRaw('players.name as name, SUM(match_players.score) as total_score, SUM(match_players.coffee) as coffee_count, SUM(match_players.mvp) as mvp_count')
            ->groupBy('players.name')
            ->get();

        $labels = $data->pluck('name');
        $scores = $data->pluck('total_score');
        $coffees = $data->pluck('coffee_count');
        $mvps = $data->pluck('mvp_count');

        return view('charts.index', compact('labels', 'scores', 'coffees', 'mvps'));
    }
}
