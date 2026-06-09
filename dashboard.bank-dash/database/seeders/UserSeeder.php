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
            ["name" => "Mitsuki", "title" => "Trailblazer", "email" => "mitsuki@trailblazer.com", "image" => public_path("m7th-1-1.png")],
            ["name" => "Hitori Gotoh", "title" => "Lead Guitar", "email" => "bocchi@kessoku.com", "image" => public_path("hitori-gotoh.png")],
            ["name" => "Ikuyo Kita", "title" => "Lead Vocalist", "email" => "ikuyo@kessoku.com", "image" => public_path("ikuyo-kita.png")],
            ["name" => "Nijika Ijichi", "title" => "Bassist", "email" => "nijika@kessoku.com", "image" => public_path("nijika-ijichi.jpg")],
            ["name" => "Ryo Yamada", "title" => "Drummer", "email" => "ryo@kessoku.com", "image" => public_path("ryo-yamada.jpg")],
        ];
        foreach ($knownUsers as $user) {
            $investmentLen = fake()->numberBetween(1, 5);
            $loanLen = fake()->numberBetween(1, 5);
            $cardLen = fake()->numberBetween(1, 2);
            $newUser = User::factory()->withInformation([
                'fullname' => $user["name"],
                'title' => $user['title'],
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
            $newUser->information->image = $user['image'];
            $newUser->information->save();
        }
    }
}
