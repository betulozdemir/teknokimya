<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
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
            'title' => 'Best Company!',
            'comment' => fake()->sentence(14),
            'client_name' => fake()->name(),
            'client_designation' => 'Founder & CEO',
            'avatar' => 'assets/images/user/user-thumb-01.png',
            'rating' => 5,
            'sort_order' => 1,
            'is_active' => true,
        ];
    }
}
