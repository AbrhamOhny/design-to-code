<?php

namespace App\Models\Investment;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class InvestmentParty extends Model
{
    public function investment(): HasMany
    {
        return $this->hasMany(UserInvestment::class);
    }
}
