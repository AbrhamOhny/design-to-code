<?php

namespace Database\Factories\Investment;

use App\Models\Investment\InvestmentParty;
use App\Models\Transaction\TransactionHandler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<InvestmentParty>
 */
class InvestmentPartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $receiver = TransactionHandler::create();
        return [
            'receiver_id' => $receiver->id,
            'name' => fake()->company(),
        ];
    }
}
