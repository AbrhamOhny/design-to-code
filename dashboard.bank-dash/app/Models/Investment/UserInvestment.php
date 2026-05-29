<?php

namespace App\Models\Investment;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'party_id', 'amount', 'date_invested'])]
class UserInvestment extends Model
{
    protected function casts(): array
    {
        return [
            'date_invested' => 'datetime'
        ];
    }

    public function party(): BelongsTo
    {
        return $this->belongsTo(InvestmentParty::class, 'party_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
