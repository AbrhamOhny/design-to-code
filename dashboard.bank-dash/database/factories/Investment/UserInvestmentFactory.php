<?php

namespace Database\Factories\Investment;

use App\Models\Investment\InvestmentParty;
use App\Models\Investment\UserInvestment;
use App\Models\Transaction\TransactionLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserInvestment>
 */
class UserInvestmentFactory extends Factory
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
            'party_id' => InvestmentParty::query()->inRandomOrder()->value('id'),
            'amount' => fake()->numberBetween(200, $max),
        ];
    }
    public function configure(): static
    {
        return $this->afterCreating(function (UserInvestment $investment) {
            $t = TransactionLog::create([
                'sender_id' => $investment->user->receiver_id,
                'receiver_id' => $investment->party_id,
                'amount' => $investment->amount,
            ]);
            $t->mail()->create([
                'title' => "Investment Confirmation #{$t->id}",
                'description' => 'Invested to ' . $investment->party->name,
                'is_read' => fake()->randomElement([true, false]),
            ]);
        });
    }
}
