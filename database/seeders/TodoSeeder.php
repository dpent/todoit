<?php

namespace Database\Seeders;

use App\Models\TodoJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TodoJob::factory()->count(200)->create();
    }
}
