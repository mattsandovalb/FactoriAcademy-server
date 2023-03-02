<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;
    /** @test */
    public function making_an_api_logout_request(): void
    {
        $response = $this->postJson('/api/login', [
            "email" => "admin@example.com",
            'password' => 'factoria',
        ]);

        $this->assertAuthenticatedAs(Auth::user());

        
        $response = $this->postJson('/api/logout');


        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ]);

        $this->assertGuest();
    }
}
