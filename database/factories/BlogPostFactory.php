<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'category' => 'Company',
            'author' => 'Admin',
            'published_date' => 'Feb 8, 2024',
            'excerpt' => fake()->sentence(15),
            'image' => 'assets/images/blog/blog-thumb-11.png',
            'is_featured' => false,
            'sort_order' => 1,
            'is_active' => true,
        ];
    }
}
