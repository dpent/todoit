<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_createTodo(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $todo =[
            'title' => 'New Todo task',
            'priority' => 5,
        ];

        $response = $this->post('/createTodo',$todo);
        $this->assertDatabaseHas('todo_jobs',[
            'title' => 'New Todo task',
            'priority' => 5,
        ]);
    }
}
