<?php

namespace App\Models\Investment;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['user_id', 'party_id', 'amount'])]
class UserInvestment extends Model
{
    /** @use HasFactory<UserInvestment> */
    use HasFactory;

    protected $table = "users_investment";

    public function party(): BelongsTo
    {
        return $this->belongsTo(InvestmentParty::class, 'party_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
