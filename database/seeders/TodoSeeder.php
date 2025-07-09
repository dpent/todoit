<?php

namespace Database\Seeders;

use App\Models\TodoJob;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        TodoJob::factory()->count(200)->make()
        ->each(function (TodoJob $todoJob) use ($users){
            $todoJob->user_id=$users->random()->id;
            $todoJob->save();
        });
    }
}
