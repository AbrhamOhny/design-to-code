<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()
            ->afterCreating(function (User $user) {
                $user->information()->update(['fullname' => 'Test User']);
            })
            ->create([
                'email' => 'test@example.com',
                'password' => 'password'
            ]);
    }
}
