<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subtitle' => 'Welcome to Teknokimya',
            'title' => fake()->words(2, true),
            'highlight_text' => 'Laboratory',
            'description' => fake()->sentence(12),
            'button_text' => 'Explore More - Explore More -',
            'button_url' => '#contact',
            'background_image' => 'assets/images/bg/banner-bg-09.png',
            'sort_order' => 1,
            'is_active' => true,
        ];
    }
}
