<?php

namespace Database\Seeders;

use App\Models\Card\UserCard;
use App\Models\Investment\UserInvestment;
use App\Models\Loan\UserLoan;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->withInformation([
            'fullname' => 'test user',
            'country' => 'indonesia',
        ])
        ->has(
            UserInvestment::factory()->count(5),
            'investment'
        )
        ->has(
            UserCard::factory()->count(2)->sequence(
                ['name_on_card' => 'test user'],
                ['name_on_card' => 'test user 2']
            ),
            'card'
        )
        ->has(
            UserLoan::factory()->count(5),
            'loan'
        )
        ->create([
            'email' => 'test@example.com',
        ]);
    }
}
