<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TeamMember>
 */
class TeamMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'designation' => fake()->jobTitle(),
            'image' => 'assets/images/team/team-thumb-01.png',
            'twitter_url' => '#',
            'facebook_url' => '#',
            'linkedin_url' => '#',
            'sort_order' => 1,
            'is_active' => true,
        ];
    }
}
