<?php


namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class CoursesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    protected $seed = true;


    /** @test */
    public function making_a_courses_api_index_request(): void
    {
        $response = $this->get('/api/courses');


        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
            ]);
    }

    /** @test */
    public function making_api_courses_store_request_loged(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => "admin@example.com",
            'password' => 'factoria',
        ]);

        $this->assertAuthenticatedAs(Auth::user());


        $response = $this->postJson('/api/courses', [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'tech' => 'Test Tech',
            'poster' => 'Test Poster',
            'level' => 'Test Level',
        ]);


        $this->assertDatabaseHas('courses', [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'tech' => 'Test Tech',
            'poster' => 'Test Poster',
            'level' => 'Test Level',
        ]);


        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ]);
    }
    /** @test */


    public function making_an_api_course_store_request_not_loged_in(): void
    {
        $response = $this->postJson('/api/courses', [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'tech' => 'Test Tech',
            'poster' => 'Test Poster',
            'level' => 'Test Level',
        ]);


        $this->assertDatabaseMissing('courses', [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'tech' => 'Test Tech',
            'poster' => 'Test Poster',
            'level' => 'Test Level',
        ]);
        $response
            ->assertStatus(401);
    }

    /** @test */
    public function making_an_api_courses_update_request_loged_in(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => "admin@example.com",
            'password' => 'factoria',
        ]);


        $this->assertAuthenticatedAs(Auth::user());


        $response = $this->put('/api/courses/1', [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'tech' => 'Test Tech',
            'poster' => 'Test Poster',
            'level' => 'Test Level',
        ]);


        $this->assertDatabaseHas('courses', [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'tech' => 'Test Tech',
            'poster' => 'Test Poster',
            'level' => 'Test Level',
        ]);
        $response
            ->assertStatus(200);
    }

    /** @test */
    public function making_an_api_courses_update_request_not_loged_in(): void
    {
        $response = $this->put('/api/courses/1', [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'tech' => 'Test Tech',
            'poster' => 'Test Poster',
            'level' => 'Test Level',
        ]);
        $this->assertDatabaseMissing('courses', [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'tech' => 'Test Tech',
            'poster' => 'Test Poster',
            'level' => 'Test Level',
        ]);
        $response
            ->assertStatus(500);
    }

    /** @test */
    public function making_an_api_courses_delete_request_loged_in(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => "admin@example.com",
            'password' => 'factoria',
        ]);


        $this->assertAuthenticatedAs(Auth::user());


        $response = $this->delete('/api/courses/1', []);


        $response->assertStatus(204);
    }

    /** @test */
    public function making_an_api_courses_delete_request_not_loged(): void
    {
        $response = $this->delete('/api/courses/1', []);
        $response
            ->assertStatus(500);
    }
}
