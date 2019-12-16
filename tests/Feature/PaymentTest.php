<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiIndex()
    {
        $response = $this->getJson(route('payments.index'));

        $response->assertStatus(200)
        ->assertJson([]);
    }

    public function testApiUpdate()
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

        $response = $this->postJson(route('users.register', 'nyhat2019'), $data);
        $response
            ->assertStatus(200)
            ->assertJson([]);

        $responseArray = $response->json();
        $payment = Payment::find($responseArray['data']['payment']['id']);

        $paymentData[] = [
            'id' => $payment->id,
            'status' => 'paid',
            'note' => 'hellowow',
            'form_of_payment' => 'payme',
            'paid_at' => '2019-01-01',
        ];

        $response = $this->postJson(route('payments.update'), $paymentData);
        $response
            ->assertStatus(200)
            ->assertJson([]);
    }
}
