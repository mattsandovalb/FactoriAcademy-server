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
    // public function making_api_user_get_request(): void
    // {
    //     $response = $this->postJson('/api/login', [
    //         'email' => 'admin@example.com',
    //         'password' => 'factoria',
    //     ]);

    //     $response = $this->get('/api/users/me');
    //     return response
    //     ->assertStatus(200)
    //     ->assertJson([
    //         'status' => true,
    //     ]);
    //     $this->assertAuthenticatedAs(Auth::user());
    // }



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

    /** @test */
    public function admin_can_create_an_user()
    {
        $response = $this->postJson('/api/login', [
            'email' => "admin@example.com",
            'password' => 'factoria',
        ]);

        $this->assertAuthenticatedAs(Auth::user());

        $response = $this->postJson('api/users', [
            'name' => 'Test Name',
            'email' => 'Test Email',
            // 'password' => Hash::make('factoria')
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test Name',
            'email' => 'Test Email',
            // 'password' => Hash::make('factoria')
        ]);
        $response
        ->assertStatus(200)
        ->assertJson([
            'statis' => 'success',
        ]);
    }
}
