<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\TodoJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();
        $todos = TodoJob::all();

        foreach ($todos as $todo) {
            $randomTag= $tags->random(rand(1,2))->pluck('id')->toArray();
            $todo->tags()->attach($randomTag);
        }
    }
}
