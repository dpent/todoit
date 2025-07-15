<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //Calls the Tag factory
    public function run(): void
    {
        Tag::factory()->count(10)->create();
    }
}
