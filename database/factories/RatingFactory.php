<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ratableTypes = ['App\Models\Article', 'App\Models\Image','App\Models\Video'];
        return [
            'user_id' => rand(1,10), 
            'rating' =>fake()->numberBetween(1,5), 
            'rateable_id' =>rand(1,10),
            'rateable_type' =>fake()->randomElement($ratableTypes),
        ];
    }
}
