<?php
namespace Tests\Feature;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MatchCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_matches_index(): void
    {
        $response = $this->get('/matches');
        $response->assertStatus(200);
    }

    public function test_can_create_match(): void
    {
        $player = Player::create(['name' => 'Jogador']);
        $response = $this->post('/matches', [
            'date' => '2024-01-01',
            'players' => [
                $player->id => [ 'kills' => 1 ]
            ]
        ]);
        $response->assertRedirect('/matches');
        $this->assertDatabaseHas('matches', ['date' => '2024-01-01']);
    }
}
