<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#[Fillable(['receiver_id', 'amount', 'description'])]
class TransactionLog extends Model
{
    protected $table = "transaction_log";
    public function receiver(): MorphTo
    {
        return $this->morphTo();
    }
    public function sender(): MorphTo
    {
        return $this->morphTo();
    }
    public function mail(): HasMany
    {
        return $this->hasMany(TransactionMail::class, 'transaction_log_id');
    }
}
