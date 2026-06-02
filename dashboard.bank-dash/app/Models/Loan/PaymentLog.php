<?php

namespace App\Models\Loan;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(["loan_id", "payment_amount"])]
class PaymentLog extends Model
{
    protected $table = "loans_payment_log";
    public function loan(): BelongsTo
    {
        $this->belongsTo(UsersLoan::class, 'loan_id');
    }
}
