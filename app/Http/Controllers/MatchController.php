<?php
namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\MatchPlayer;
use App\Models\Player;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Game::all();
        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $players = Player::all();
        return view('matches.create', compact('players'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['date' => 'required|date']);
        $match = Game::create($data);
        foreach ($request->input('players', []) as $playerId => $stats) {
            MatchPlayer::create([
                'match_id' => $match->id,
                'player_id' => $playerId,
                'kills' => $stats['kills'] ?? 0,
                'assists' => $stats['assists'] ?? 0,
                'damage' => $stats['damage'] ?? 0,
                'survived' => $stats['survived'] ?? 0,
                'rescue' => $stats['rescue'] ?? 0,
                'recall' => $stats['recall'] ?? 0,
                'score' => $stats['score'] ?? 0,
                'mvp' => isset($stats['mvp']),
                'coffee' => isset($stats['coffee']),
                'played' => isset($stats['played']),
            ]);
        }
        return redirect()->route('matches.index');
    }

    public function edit(Game $match)
    {
        $players = Player::all();
        $match->load('playerStats');
        return view('matches.edit', compact('match', 'players'));
    }

    public function update(Request $request, Game $match)
    {
        $data = $request->validate(['date' => 'required|date']);
        $match->update($data);
        $match->playerStats()->delete();
        foreach ($request->input('players', []) as $playerId => $stats) {
            MatchPlayer::create([
                'match_id' => $match->id,
                'player_id' => $playerId,
                'kills' => $stats['kills'] ?? 0,
                'assists' => $stats['assists'] ?? 0,
                'damage' => $stats['damage'] ?? 0,
                'survived' => $stats['survived'] ?? 0,
                'rescue' => $stats['rescue'] ?? 0,
                'recall' => $stats['recall'] ?? 0,
                'score' => $stats['score'] ?? 0,
                'mvp' => isset($stats['mvp']),
                'coffee' => isset($stats['coffee']),
                'played' => isset($stats['played']),
            ]);
        }
        return redirect()->route('matches.index');
    }

    public function destroy(Game $match)
    {
        $match->delete();
        return redirect()->route('matches.index');
    }
}
