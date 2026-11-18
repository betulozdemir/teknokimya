<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(2, true),
            'description' => fake()->sentence(10),
            'image' => 'assets/images/services/services-thumb-17.png',
            'url' => '#services',
            'sort_order' => 1,
            'is_active' => true,
        ];
    }
}
