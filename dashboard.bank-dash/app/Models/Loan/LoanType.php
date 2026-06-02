<?php

namespace App\Models\Loan;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(["name", "interest_rate"])]
class LoanType extends Model
{
    protected $table = "loans_type";
    public function user(): HasMany
    {
        $this->hasMany(User::class);
    }
}
