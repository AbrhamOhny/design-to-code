<?php

namespace Database\Factories\Card;

use App\Models\Bank\Bank;
use App\Models\Card\CardType;
use App\Models\Card\UserCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserCard>
 */
class UserCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $max = 999999999;
        $c = fake()->randomElement([0.1, 0.5, 0.55, 0.6, 0.65, 0.7, 0.75, 0.8, 0.85, 0.9, 0.95]);
        $max = $max - ($max * $c);
        return [
            'bank_id' => Bank::query()->inRandomOrder()->value('id'),
            'type_id' => CardType::query()->inRandomOrder()->value('id'),
            'name_on_card' => fake()->name(),
            'balance' => fake()->numberBetween(0, $max),
            'valid_thru' => fake()->dateTimeBetween('now', '+5 years')->format('m/y'),
        ];
    }
}
