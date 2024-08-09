<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'complement',
        'district',
        'city_id',
        'latitude',
        'longitude',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
