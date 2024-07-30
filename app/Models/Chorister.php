<?php

namespace App\Models;

use App\Enums\ChoristerEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chorister extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillabel = [
        'choir_id',
        'name',
        'birth_date',
        'age_group',
        'registration_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'registration_date' => 'date',
            'status' => ChoristerEnum::class,
        ];
    }

    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }

    public function choir(): BelongsTo
    {
        return $this->belongsTo(Choir::class);
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class)->withPivot(['status','added_at','removed_at']);
    }
}
