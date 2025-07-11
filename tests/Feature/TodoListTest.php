<?php

namespace Tests\Feature;

use App\Models\TodoJob;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use refreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    public function test_todoListHasCorrectTodos(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        TodoJob::factory()->count(20)->create([
            'user_id' => $user->id,
        ]);

        $todos=TodoJob::where('user_id',Auth::id())->get();
        $notTodos=TodoJob::wherenot('user_id',Auth::id())->get();

        $qTodos=$this->get("/todoList");

        foreach ($todos as $todo){
            $qTodos->assertSee($todo->title);
        }

        foreach ($notTodos as $notTodo){
            $qTodos->assertDontSee($notTodo->title);
        }
    }
}
