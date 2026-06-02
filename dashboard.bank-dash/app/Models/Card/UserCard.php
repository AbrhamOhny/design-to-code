<?php

namespace App\Models\Card;

use App\Models\Bank\Bank;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(["user_id", "bank_id", "type_id", "name_on_card", "balance", "valid_thru"])]
class UserCard extends Model
{
    protected $table = 'users_card';

    protected function casts(): array
    {
        return [
            'valid_thru' => 'datetime',
        ];
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(CardType::class, 'type_id');
    }
}
