<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value
                ? Storage::url($value)
                : null,
            set: function (?string $img) {
                if ($img == null) {
                    return null;
                }
                $extension = pathinfo($img, PATHINFO_EXTENSION);
                $destination = "profiles/user{$this->user_id}.{$extension}";
                Storage::disk('public')->put($destination, file_get_contents($img));
                return $destination;
            }
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
