<?php

namespace Database\Factories;

use App\Models\TodoJob;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TodoJob>
 */

//Creates Todo data and saves it to a db
class TodoJobFactory extends Factory
{
    protected $model = TodoJob::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ //Creates fake title-priority tuples
            'title'=>$this->faker->text(100),
            'priority'=>$this->faker->numberBetween(1,5),
        ];
    }
}
