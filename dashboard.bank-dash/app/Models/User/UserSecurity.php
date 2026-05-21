<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id',
    'two_factor_auth'
])]
class UserSecurity extends Model
{
    protected $table = 'users_security';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
