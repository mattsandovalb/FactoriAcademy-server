<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $seed = true;
    
    /** @test */
    public function admin_can_api_users_make_index_request()
    {
        $response = $this->postJson('/api/login', [
            'email' => "admin@example.com",
            'password' => 'factoria',
        ]);

        $this->assertAuthenticatedAs(Auth::user());

        $response = $this->get('/api/courses');

        $response
        ->assertStatus(200)
        ->assertJson([
            'status' => true,
        ]);
    }

}
