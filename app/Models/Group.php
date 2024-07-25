<?php

namespace App\Models;

use App\Enums\GroupStatusEnum;
use App\Enums\WeekDayEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'choir_id',
        'name',
        'min_age',
        'max_age',
        'encounter_weekday',
        'encounter_time',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'min_age' => 'integer',
            'max_age' => 'integer',
            'encounter_weekday' => WeekDayEnum::class,
            'encounter_time' => 'datetime',
            'status' => GroupStatusEnum::class
        ];
    }

    public function choir(): BelongsTo
    {
        return $this->belongsTo(Choir::class);
    }

    public function choristers(): BelongsToMany
    {
        return $this->belongsToMany(Chorister::class)->withPivot(['status','added_at','removed_at']);
    }
}
