<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable([
    'user_id',
    'image',
    'fullname',
    'date_of_birth',
    'present_address',
    'permanent_address',
    'city',
    'postal_code',
    'country'
])]
class UserInformation extends Model
{
    protected $table = 'users_information';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
