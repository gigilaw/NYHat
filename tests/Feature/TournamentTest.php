<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TournamentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiIndex()
    {
        $response = $this->getJson(route('tournaments.index'));

        $response->assertStatus(200)
        ->assertJson([]);
    }

    public function testApiParticipants()
    {
        $response = $this->getJson(route('tournament.participants', 'nyhat2019'));

        $response->assertStatus(200)
        ->assertJson([]);
    }
}
