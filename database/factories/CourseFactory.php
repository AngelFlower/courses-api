<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'professor_id' => $this->faker->numberBetween(1, 10),
            'language_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(640, 480, 'people'),
            'courseColor' => $this->faker->hexColor,
            'professorColor' => $this->faker->hexColor,
            'backgroundColor' => $this->faker->hexColor,
            'buttonText' => $this->faker->word,
            'buttonLink' => $this->faker->url,
            'buttonColor' =>'btn-success',
            'shadow' => 'shadow',
            'stars' => $this->faker->numberBetween(1, 5),
        ];
    }
}
