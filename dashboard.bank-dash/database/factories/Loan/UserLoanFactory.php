<?php

namespace Database\Factories\Loan;

use App\Models\Bank\Bank;
use App\Models\Loan\UserLoan;
use App\Models\Transaction\TransactionLog;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserLoan>
 */
class UserLoanFactory extends Factory
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
        $amount = fake()->numberBetween(0, $max);
        $duration_year = fake()->numberBetween(1, 20);
        $min_month = fake()->randomElement([1, 3, 6, 12]);
        $duration_month = fake()->randomElement([
            $min_month,
            12 * $duration_year,
        ]);
        $installment = $amount / $duration_month;
        $paid = fake()->numberBetween(0, $duration_month) * $installment;
        $active = $amount != $paid;
        return [
            'bank_id' => Bank::query()->inRandomOrder()->value('id'),
            'is_active' => $active,
            'amount' => $amount,
            'paid' => $paid,
            'installment' => $installment,
            'month_duration' => $duration_month,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (UserLoan $loan) {
            $bank = $loan->bank;
            $user = $loan->user;
            $_paid = (float) 0;
            $_c = 0;

            TransactionLog::create([
                'sender_id' => $bank->receiver_id,
                'receiver_id' => $user->receiver_id,
                'amount' => $loan->amount,
                'description' => "Dear, " . $user->email . "\nWe've accepted your loan request.\nRegards, " . $bank->name,
            ]);
            while ($_paid < $loan->paid) {
                $_paid += $loan->installment;
                $_c += 1;
                TransactionLog::create([
                    'sender_id' => $user->receiver_id,
                    'receiver_id' => $bank->receiver_id,
                    'amount' => $loan->installment,
                    'description' => "Loan Payment to " . $bank->name . "[" . $_c . "/" . $loan->month_duration . "]",
                ]);
            }
        });
    }
}
