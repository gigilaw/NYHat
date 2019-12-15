<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiIndex()
    {
        $response = $this->getJson(route('users.index'));

        $response->assertStatus(200)
        ->assertJson([]);
    }

    public function testApiStore()
    {
        $fakeUser = factory(User::class)->make();
        $data = [
            'first_name' => $fakeUser->first_name,
            'last_name' => $fakeUser->last_name,
            'email' => $fakeUser->email,
            'age' => $fakeUser->age,
            'height' => $fakeUser->height,
            'gender' => $fakeUser->gender,
            'position' => $fakeUser->position,
            'throwing' => $fakeUser->throwing,
            'catching' => $fakeUser->catching,
            'speed' => $fakeUser->speed,
            'offense' => $fakeUser->offense,
            'defense' => $fakeUser->defense,
        ];

        $response = $this->json('POST', route('users.store'), $data);
        $response
            ->assertStatus(200)
            ->assertJson(['data' => true]);
    }
}
