<?php

namespace App\Models\Investment;

use App\Models\Transaction\TransactionHandler;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(["name"])]
class InvestmentParty extends Model
{
    /** @use HasFactory<InvestmentParty> */
    use HasFactory;

    protected $table = "investment_party";
    public $timestamps = false;
    public function investment(): HasMany
    {
        return $this->hasMany(UserInvestment::class);
    }
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(TransactionHandler::class, 'receiver_id');
    }
}
