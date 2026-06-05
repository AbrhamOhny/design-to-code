<?php

namespace App\Models\Transaction;

use App\Models\Bank\Bank;
use App\Models\Investment\InvestmentParty;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([])]
class TransactionHandler extends Model
{
    protected $table = "transaction_handler";
    public $timestamps = false;
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id');
    }
    public function bank(): HasOne
    {
        return $this->hasOne(Bank::class, 'id');
    }
    public function investParty(): HasOne
    {
        return $this->hasOne(InvestmentParty::class, 'id');
    }
}
