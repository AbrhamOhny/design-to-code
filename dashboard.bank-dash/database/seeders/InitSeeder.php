<?php

namespace Database\Seeders;

use App\Models\Bank\Bank;
use App\Models\Card\CardType;
use App\Models\Investment\InvestmentParty;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $card_types = [
            'credit', 'visa', 'mastercard',
        ];
        $banks = [
            'Bankdash', 'BCA', 'BRI', 'Mandiri', 'Paypal',
        ];
        $investment_parties = [
            'PLN', 'GOTO', 'SPBU',
        ];
        foreach ($card_types as $card) {
            CardType::create([
                'name' => $card,
            ]);
        }
        foreach ($banks as $bank) {
            Bank::factory()->create([
                'name' => $bank,
            ]);
        }
        foreach ($investment_parties as $party) {
            InvestmentParty::factory()->create([
                'name' => $party,
            ]);
        }
    }
}
