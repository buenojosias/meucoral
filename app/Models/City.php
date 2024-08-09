<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillabe = [
        'state_id',
        'name',
    ];

    public $timestamps = false;

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function choirs(): HasMany
    {
        return $this->hasMany(ChoirProfile::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
