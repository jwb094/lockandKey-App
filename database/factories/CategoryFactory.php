<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        $categories = [
            // Personal & Identity
            'Email Accounts',
            'Social Media',
            'Entertainment & Streaming',
            'Gaming',
            'Personal Blogs & Portfolios',

            // Financial & Commerce
            'Banking & Finance',
            'E-commerce & Shopping',
            'Cryptocurrency & Wallets',
            'Utilities & Bills',

            // Professional & Productivity
            'Work & Corporate',
            'Cloud Storage & Backups',
            'Developer Tools & Hosting',
            'Project Management',
            'Education & Learning',

            // Infrastructure & Devices
            'Wi-Fi & Networks',
            'Server & SSH Keys',
            'Smart Home & IoT',
            'Databases',

            // Sensitive & Miscellaneous
            'Government & Tax Portals',
            'Medical & Health Insurance',
        ];

        $name = $this->faker->unique()->randomElement($categories);
        return [
            //
            'name' => $name,
            'notes' => fake()->paragraph()
        ];
    }
}
