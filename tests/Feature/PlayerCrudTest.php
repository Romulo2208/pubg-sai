<?php

namespace Tests\Feature;

use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_players_index(): void
    {
        $response = $this->get('/players');
        $response->assertStatus(200);
    }

    public function test_can_create_player(): void
    {
        $response = $this->post('/players', ['name' => 'Teste']);
        $response->assertRedirect('/players');
        $this->assertDatabaseHas('players', ['name' => 'Teste']);
    }
}
