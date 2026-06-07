<?php

namespace Database\Seeders;

use App\Models\Card\UserCard;
use App\Models\Investment\UserInvestment;
use App\Models\Loan\UserLoan;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $knownUsers = [
            ["name" => "Mitsuki", "email" => "test@example.com", "image" => public_path("m7th-1-1.png")],
            ["name" => "Hitori Gotoh", "email" => "test2@example.com", "image" => public_path("bocchi.png")],
            ["name" => "Nijika Ijichi", "email" => "test3@example.com", "image" => public_path("nijika.jpg")],
            ["name" => "Ryo Yamada", "email" => "test4@example.com", "image" => public_path("ryo.jpg")],
        ];
        foreach ($knownUsers as $user) {
            $investmentLen = fake()->numberBetween(1, 5);
            $loanLen = fake()->numberBetween(1, 5);
            $cardLen = fake()->numberBetween(1, 2);
            $newUser = User::factory()->withInformation([
                'fullname' => $user["name"],
            ])
            ->has(
                UserInvestment::factory()->count($investmentLen),
                'investment'
            )
            ->has(
                UserCard::factory()->count($cardLen)->sequence(
                    ['name_on_card' => 'test user'],
                    ['name_on_card' => 'test user 2']
                ),
                'card'
            )
            ->has(
                UserLoan::factory()->count($loanLen),
                'loan'
            )
            ->create([
                'email' => $user['email'],
            ]);
            foreach ($newUser->card as $card) {
                $card->name_on_card = fake()->randomElement([$user['name'], fake()->name()]);
                $card->save();
            }
            $extension = pathinfo($user['image'], PATHINFO_EXTENSION);
            $imgSaveDest = "profiles/user{$newUser->id}.{$extension}";
            Storage::disk('public')->put($imgSaveDest, file_get_contents($user['image']));
            $newUser->information->image = $imgSaveDest;
            $newUser->information->save();
        }
    }
}
