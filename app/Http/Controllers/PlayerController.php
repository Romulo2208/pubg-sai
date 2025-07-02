<?php
namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:players,name',
        ]);
        Player::create($data);
        return redirect()->route('players.index');
    }

    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:players,name,' . $player->id,
        ]);
        $player->update($data);
        return redirect()->route('players.index');
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index');
    }
}
