<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id',
    'currency',
    'time_zone',
    'notification_digital_currency',
    'notification_merchant_order',
    'notification_recommendation'
])]
class UserPreference extends Model
{
    protected $table = 'users_preference';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
