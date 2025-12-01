<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => Type::factory(),
            'picture' => $this->faker->imageUrl(640, 480, 'books', true),
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'publisher' => $this->faker->company(),
            'quantityStock' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
