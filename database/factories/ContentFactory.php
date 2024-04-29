<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Issue;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['post', 'essay', 'poll']),
            'title' => fake()->words(3,true),
            'content' => fake()->paragraphs(2,true),
            'image' => fake()->imageUrl($width = 640, $height = 480),
            'slug' => fake()->unique()->slug(),
            'user_id' => User::all()->random()->id,
            'issue_id' => Issue::all()->random()->id,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
    }
}
