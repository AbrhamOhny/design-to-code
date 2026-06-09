<?php

namespace Database\Factories\Transaction;

use App\Models\Transaction\TransactionMail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransactionMail>
 */
class TransactionMailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->realText(200),
            'is_read' => fake()->randomElement([true, false]),
        ];
    }
}
