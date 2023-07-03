<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Mode;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(5),
            'status' => fake()->randomElement(['visible','draft','hidden']),
            'price' => fake()->randomFloat(2,0,100,000),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'zone_id' => Zone::all()->random()->id,
            'mode_id' => Mode::all()->random()->id,
        ];
    }
}
