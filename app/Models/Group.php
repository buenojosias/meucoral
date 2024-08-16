<?php

namespace App\Models;

use App\Enums\GroupStatusEnum;
use App\Enums\WeekDayEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
        'status',
        'start_date',
        'end_date'
    ];

    protected function casts(): array
    {
        return [
            'min_age' => 'integer',
            'max_age' => 'integer',
            'encounter_weekday' => WeekDayEnum::class,
            'encounter_time' => 'datetime',
            'status' => GroupStatusEnum::class,
            'start_date' => 'date',
            'end_date' => 'date'
        ];
    }

    protected $appends = ['description'];

    public function getDescriptionAttribute()
    {
        $weekdayLabel = WeekdayEnum::from($this->attributes['encounter_weekday'])->label();
        $timeFormatted = date('H:i', strtotime($this->attributes['encounter_time']));
        return "{$weekdayLabel}, {$timeFormatted}";
    }

    public function choir(): BelongsTo
    {
        return $this->belongsTo(Choir::class);
    }

    public function encounters(): HasMany
    {
        return $this->hasMany(Encounter::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function choristers(): BelongsToMany
    {
        return $this->belongsToMany(Chorister::class)->withPivot(['situation','added_at','removed_at']);
    }

    public function activeChoristers(): BelongsToMany
    {
        return $this->belongsToMany(Chorister::class)->wherePivot('situation','Ativo')->where('status','Ativo');
    }
}
