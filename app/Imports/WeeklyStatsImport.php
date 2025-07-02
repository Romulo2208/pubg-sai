<?php
namespace App\Imports;

use App\Models\WeeklyStat;
use App\Models\Player;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WeeklyStatsImport implements ToModel, WithHeadingRow {
    public function model(array $row) {
        $player = Player::firstOrCreate(['name' => $row['player']]);
        return new WeeklyStat([
            'week_start'      => \Carbon\Carbon::parse($row['dia']),
            'player_id'       => $player->id,
            'kills'           => $row['abates'],
            'assists'         => $row['assistências'],
            'damage'          => $row['dano'],
            'survived_minutes'=> $row['sobreviveu'],
            'rescues'         => $row['resgate'],
            'call_back'       => $row['chamar_de_volta'] ?? 0,
            'score'           => $row['pontuação'],
            'mvp_count'       => $row['mvp'],
            'coffee_breaks'   => $row['café'],
            'matches_played'  => $row['partidas_jogadas'],
        ]);
    }
}
