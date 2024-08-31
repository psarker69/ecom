<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_name'=>$this->faker->name,
            'client_designation'=>$this->faker->jobTitle . '-' . $this->faker->company,
            'client_message'=>$this->faker->paragraph(),
        ];
    }
}
