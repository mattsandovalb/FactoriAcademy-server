<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoursesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_api_courses_request_index()
    {

    }
    /** @test */
    public function an_api_courses_request_index_login()
    {
    /** @test */
    }
    public function an_api_courses_request_not_loged()
    {
    
    }
    /** @test */
    public function an_api_courses_update_request_loged()
    {
        
    }
    /** @test */
    public function an_api_courses_update_request_not_loged()
    {

    }
    /** @test */
    public function an_api_courses_deleted_request_loged()
    {

    }
    /** @test */
    public function an_api_courses_deleted_request_not_loged()
    {

    }
}   
