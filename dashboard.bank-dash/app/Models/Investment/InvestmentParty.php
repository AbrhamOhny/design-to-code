<?php

namespace App\Models\Investment;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(["name"])]
class InvestmentParty extends Model
{
    protected $table = "investment_party";
    public function investment(): HasMany
    {
        return $this->hasMany(UserInvestment::class);
    }
}
