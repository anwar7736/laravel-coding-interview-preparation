<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    public function test_post_list(): void
    {
        $posts = Post::factory(10)->create();
        $response = $this->getJson('/posts');

        $response->assertStatus(200);
        $response->assertJsonCount($posts->count(), 'data');
    }

    public function test_post_store(): void
    {
        $post = [
            'title' => 'Test Post Title',
            'content' => 'This is the content of the test post.',
            'author_id' => User::factory()->create()->id,
        ];

        Post::create($post);
        $response = $this->postJson('/posts', $post);
        $response->assertJsonMissingValidationErrors(['title', 'content', 'author_id']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', $post);
    }

    public function test_post_details(): void
    {
        $post = [
            'title' => 'Test Post Title',
            'content' => 'This is the content of the test post.',
            'author_id' => User::factory()->create()->id,
        ];

        $data = Post::create($post);
        $response = $this->getJson("/posts/{$data->id}");
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', $post);
        $this->assertDatabaseHas('posts', ['id' => $data->id]);
    }

    public function test_post_update(): void
    {
        $data = [
            'title' => 'Test Post Title',
            'content' => 'This is the content of the test post.',
            'author_id' => User::factory()->create()->id,
        ];

        $post = Post::create($data);
        $updated_data = [
            'title' => 'Updated Post Title',
            'content' => 'This is the updated content of the test post.',   
            'author_id' => $post->author_id,
        ];
        $post->update($updated_data);
        $response = $this->putJson("/posts/{$post->id}", $updated_data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', $updated_data);
    }

    public function test_post_delete(): void
    {
        $data = [
            'title' => 'Test Post Title',
            'content' => 'This is the content of the test post.',
            'author_id' => User::factory()->create()->id,
        ];

        $post = Post::create($data);
        $response = $this->deleteJson("/posts/{$post->id}");
        $response->assertStatus(200);
    }
}
