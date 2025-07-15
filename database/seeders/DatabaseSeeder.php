<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    //This is what is called when seeding. It in turn calls
    //the other seeders
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            TodoSeeder::class,
            TagsTodosSeeder::class,
        ]);
    }
}
