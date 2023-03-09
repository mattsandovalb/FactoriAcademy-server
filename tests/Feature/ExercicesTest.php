<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ExercicesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function making_a_exercices_api_index_request(): void
    {
        $response = $this->get('/api/exercices');

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
    }

    /** @test */
    public function making_api_exercices_store_request_loged(): void
    {

        $response = $this->postJson('/api/login', [
            'email' => "admin@example.com",
            'password' => 'factoria',
        ]);
        $this->assertAuthenticatedAs(Auth::user());

        $response = $this->postJson('/api/exercices', [
            'title' => 'Test Title',
            'statment' => 'Test Statment',
            'instruction' => 'Test Instruction',
            'documentation1' => 'Test Documentation1',
            'documentation2' => 'Test Documentation2',
            'solution' => 'Test Solution',
            'value' => 50,
        ]);

        $this->assertDatabaseHas('exercices', [
            'title' => 'Test Title',
            'statment' => 'Test Statment',
            'instruction' => 'Test Instruction',
            'documentation1' => 'Test Documentation1',
            'documentation2' => 'Test Documentation2',
            'solution' => 'Test Solution',
            'value' => 50,
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ]);
    }

    /** @test */
    public function making_an_api_exercices_strore_request_not_loged_in(): void
    {
        $response = $this->postJson('/api/exercices', [
            'title' => 'Test Title',
            'statment' => 'Test Statment',
            'instruction' => 'Test Instruction',
            'documentation1' => 'Test Documentation1',
            'documentation2' => 'Test Documentation2',
            'solution' => 'Test Solution',
            'value' => 50,
        ]);

        $this->assertDatabaseMissing('exercices', [
            'title' => 'Test Title',
            'statment' => 'Test Statment',
            'instruction' => 'Test Instruction',
            'documentation1' => 'Test Documentation1',
            'documentation2' => 'Test Documentation2',
            'solution' => 'Test Solution',
            'value' => 50,
        ]);
        $response
            ->assertStatus(401);
    }

    /** @test */
    public function making_an_api_exercices_update_request_loged_in(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => "admin@example.com",
            'password' => 'factoria',
        ]);
        $this->assertAuthenticatedAs(Auth::user());

        $response = $this->put('/api/exercices/1', [
            'title' => 'Test Title',
            'statment' => 'Test Statment',
            'instruction' => 'Test Instruction',
            'documentation1' => 'Test Documentation1',
            'documentation2' => 'Test Documentation2',
            'solution' => 'Test Solution',
            'value' => 50,
        ]);

        $this->assertDatabaseHas('exercices', [
            'title' => 'Test Title',
            'statment' => 'Test Statment',
            'instruction' => 'Test Instruction',
            'documentation1' => 'Test Documentation1',
            'documentation2' => 'Test Documentation2',
            'solution' => 'Test Solution',
            'value' => 50,
        ]);
        $response
            ->assertStatus(200);
    }

    /** @test */
    public function making_an_api_exercices_update_request_not_loged_in(): void
    {
        $response = $this->postJson('/api/exercices/1', [
            'title' => 'Test Title',
            'statment' => 'Test Statment',
            'instruction' => 'Test Instruction',
            'documentation1' => 'Test Documentation1',
            'documentation2' => 'Test Documentation2',
            'solution' => 'Test Solution',
            'value' => 50,
        ]);

        $this->assertDatabaseMissing('exercices', [
            'title' => 'Test Title',
            'statment' => 'Test Statment',
            'instruction' => 'Test Instruction',
            'documentation1' => 'Test Documentation1',
            'documentation2' => 'Test Documentation2',
            'solution' => 'Test Solution',
            'value' => 50,
        ]);
        $response
            ->assertStatus(405);
    }

    /** @test */
    public function making_an_api_exercices_delete_request_loged_in(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => "admin@example.com",
            'password' => 'factoria',
        ]);
        $this->assertAuthenticatedAs(Auth::user());

        $response = $this->delete('/api/exercices/1', []);
        $response->assertStatus(204);
    }

    /** @test */
    public function making_an_api_exercices_delete_request_not_loged(): void
    {
        $response = $this->delete('/api/exercices/1', []);
        $response
            ->assertStatus(302);
    }
}
