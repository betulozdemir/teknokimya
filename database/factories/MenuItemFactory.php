<?php

namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MenuItem>
 */
class MenuItemFactory extends Factory
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
            'url' => '#',
            'target' => '_self',
            'sort_order' => fake()->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
