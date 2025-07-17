<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\TodoJob;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function test_todoDeleteTagDelete(): void{

        $user = User::factory()->create();
        $this->actingAs($user);

        $todo = TodoJob::factory()->create([
            'user_id' => Auth::id(),
        ]);
        $tag = Tag::factory()->create();

        $todo->tags()->attach($tag->id);

        // Assert that the pivot table has the record
        $this->assertDatabaseHas('tags_todos', [
            'todo_job_id' => $todo->id,
            'tag_id' => $tag->id,
        ]);

        $todo->delete();

        $this->assertDatabaseMissing('tags_todos', [
            'todo_job_id' => $todo->id,
            'tag_id' => $tag->id,
        ]);
    }

    public function test_todoDeleteNoTags(): void{

        $user = User::factory()->create();
        $this->actingAs($user);

        $todo = TodoJob::factory()->create([
            'user_id' => Auth::id(),
        ]);

        DB::table('tags_todos')->insert([
            'todo_job_id' => $todo->id,
            'tag_id' => null,
        ]);

        // Assert that the pivot table has the record
        $this->assertDatabaseHas('tags_todos', [
            'todo_job_id' => $todo->id,
            'tag_id' => null,
        ]);

        $todo->delete();

        $this->assertDatabaseMissing('tags_todos', [
            'todo_job_id' => $todo->id,
            'tag_id' => null,
        ]);
    }
}
