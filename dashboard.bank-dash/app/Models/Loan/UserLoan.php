<?php

namespace App\Models\Loan;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(["type_id", "user_id", "is_active", "amount", "paid", "installment", "deadline"])]
class UsersLoan extends Model
{
    protected function casts(): array
    {
        return [
            "is_active" => "boolean",
            "deadline" => "datetime",
        ];
    }

    public function user(): BelongsTo
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function type(): BelongsTo
    {
        $this->belongsTo(LoanType::class, 'type_id');
    }
}
