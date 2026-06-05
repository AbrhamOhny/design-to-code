<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'title',
    'image',
    'fullname',
    'date_of_birth',
    'present_address',
    'permanent_address',
    'city',
    'postal_code',
    'country',
])]
class UserInformation extends Model
{
    /** @use HasFactory<UserInformation> */
    use HasFactory;

    protected $table = 'users_information';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
