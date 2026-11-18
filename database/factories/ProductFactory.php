<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
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
            'category' => 'Laboratory',
            'description' => fake()->sentence(10),
            'image' => 'assets/images/portfolio/portfolio-thumb-21.png',
            'is_featured' => false,
            'sort_order' => 1,
            'is_active' => true,
        ];
    }
}
