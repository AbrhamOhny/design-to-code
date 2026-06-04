<?php

namespace App\Models\Bank;

use App\Models\Card\UserCard;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name'])]
class Bank extends Model
{
    /** @use HasFactory<Bank\BankFactory> */
    use HasFactory;

    public $timestamps = false;
    protected $table = 'registered_banks';

    public function card(): HasMany
    {
        return $this->hasMany(UserCard::class);
    }
}
