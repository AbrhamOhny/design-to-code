<?php

namespace App\Models\Card;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(["name"])]
class CardType extends Model
{
    protected $table = "card_type";
    public $timestamps = false;
    public function card(): HasMany
    {
        return $this->hasMany(UserCard::class);
    }
}
