<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idpost' => $this->faker->numberBetween(100000000, 999999999),
            'authorID' => 'user654403',
            'title' => $this->faker->text(72),
            'content' => $this->faker->paragraphs(4,true),
            'url' => $this->faker->slug(3),
            'create_time' => now(),
            'update_time' => null
        ];
    }
}
