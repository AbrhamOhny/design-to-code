<?php

namespace App\Models\Investment;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(["name"])]
class InvestmentParty extends Model
{
    protected $table = "investment_party";
    public $timestamps = false;
    public function investment(): HasMany
    {
        return $this->hasMany(UserInvestment::class);
    }
}
