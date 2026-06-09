<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(["title", "description", "is_read"])]
class TransactionMail extends Model
{
    /** @use HasFactory<TransactionMail> */
    use HasFactory;

    protected $table = "transaction_mail";

    public function cast(): array
    {
        return [
            'is_read' => 'boolean',
        ];
    }

    public function log(): BelongsTo
    {
        return $this->belongsTo(TransactionLog::class);
    }
}
