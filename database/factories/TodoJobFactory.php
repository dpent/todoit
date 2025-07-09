<?php

namespace Database\Factories;

use App\Models\TodoJob;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TodoJob>
 */
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
        return [
            'title'=>$this->faker->text(100),
            'priority'=>$this->faker->numberBetween(1,5),
        ];
    }
}
