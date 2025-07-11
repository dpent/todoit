<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */

//Creates Tag data and saves them to a db
class TagFactory extends Factory
{

    protected $model = Tag::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Creates fake titles, with a max character number
        return [
            'title'=>$this->faker->text(10)
        ];
    }
}
