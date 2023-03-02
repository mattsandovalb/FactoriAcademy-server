<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    /** @test */
    public function making_an_api_login_request_following_all_rules(): void
    {
        $response = $this->postJson('/api/login', [
            "email" => "admin@example.com",
            'password' => 'factoria',
        ]);

        
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ])
            ->assertJsonStructure([
                'status', 'user', 'authorization'
            ]);
            
            $this->assertAuthenticatedAs(Auth::user());
    }

    /** @test */
    public function making_an_api_login_request_without_following_all_rules(): void
    {
        $response = $this->postJson('/api/login', [
            "email" => "",
            'password' => 'factoria',
        ]);
        
        $response
        ->assertStatus(422)
        ->assertJsonStructure([
            'message', 'errors', 
        ]);;

        $this->assertGuest();

    }
}
