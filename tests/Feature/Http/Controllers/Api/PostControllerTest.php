<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class PostControllerTest extends TestCase
{
    

    


    public function test_store()
    {
        //$this->withoutExceptionHandling(); //Nos dice claramente que esta pasando
        
        $response = $this->json('POST', '/api/posts', [
            'title' => 'El post de prueba'
        ]);
        
        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => 'El post de prueba'])
            ->assertStatus(201);
        
        $this->assertDatabaseHas('posts', ['title' => 'El post de prueba']);
    }


    public function test_validate_title()
    {
        $response = $this->json('POST', '/api/posts', [
            'title' => ''
        ]);
        $response->assertStatus(422)->assertJsonValidationErrors('title');
    }


    public function test_show()
    {
        $post = factory(Post::class)->create();
        
        $response = $this->json('GET', "/api/posts/$post->id", [
            'title' => 'El post de prueba'
        ]);
        
        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
            ->assertJson(['title' => $post->title])
            ->assertStatus(200);//Ok
    }

    public function test_404_show()
    {
        $response = $this->json('GET', '/api/posts/1000');
        $response->assertStatus(404); //Not found
    }
}
