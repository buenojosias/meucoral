<?php

namespace App\Models;

use App\Enums\ChoristerStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chorister extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'choir_id',
        'name',
        'birthdate',
        'registration_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'birthdate' => 'date',
            'registration_date' => 'date',
            'status' => ChoristerStatusEnum::class,
        ];
    }

    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }

    public function choir(): BelongsTo
    {
        return $this->belongsTo(Choir::class);
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class)->withPivot(['situation','added_at','removed_at']);
    }

    public function activeGroups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class)->wherePivot('situation','Ativo')->where('status','Ativo');
    }

    public function kins(): HasMany
    {
        return $this->hasMany(Kin::class);
    }
}
