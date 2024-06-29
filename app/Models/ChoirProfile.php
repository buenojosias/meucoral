<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChoirProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'choir_id',
        'city_id',
        'logo',
        'description',
        'institution',
    ];

    public function choir(): BelongsTo
    {
        return $this->belongsTo(Choir::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}
