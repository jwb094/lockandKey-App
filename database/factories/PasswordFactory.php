<?php

namespace Database\Factories;

use App\Models\Password;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Password>
 */
class PasswordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

     // Pick a random category from the DB
        $category = Category::inRandomOrder()->first();

        $plainPassword = fake()->password(8, 20);
        return [

        'username'      => fake()->userName(),          // e.g., 'john.doe' or 'amanda62'
        'website'       => fake()->url(),               // e.g., 'https://smith.com'
        'password'      => $plainPassword,              // Plain text password string
        'password_hash' => Hash::make($plainPassword),   // Securely hashed Laravel variant
        'notes'         => fake()->realText(200),
        'category_id'   => $category->id       // A readable paragraph up to 200 characters
        ];
    }
}
