<?php

namespace App\Models\Loan;

use App\Models\Bank\Bank;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(["user_id", "is_active", "amount", "paid", "installment", "month_duration"])]
class UserLoan extends Model
{
    /** @use HasFactory<UserLoan> */
    use HasFactory;

    protected $table = "users_loan";
    protected function casts(): array
    {
        return [
            "is_active" => "boolean",
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
