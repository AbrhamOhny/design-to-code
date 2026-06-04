<?php

namespace Database\Seeders;

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
        ])->withCard([
            'name_on_card' => 'test user',
        ])->withCard([
            'name_on_card' => 'test user 2',
        ])->withInvestment()->create([
            'email' => 'test@example.com',
        ]);
    }
}
