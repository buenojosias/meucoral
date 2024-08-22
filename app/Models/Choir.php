<?php

namespace App\Models;

use App\Enums\AgeGroupEnum;
use App\Enums\ChoirCategoryEnum;
use App\Models\Scopes\UserScope;
use App\Traits\DeleteChoir;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ScopedBy(UserScope::class)]
class Choir extends Model
{
    use HasFactory, SoftDeletes, DeleteChoir;

    protected $fillable = [
        'user_id',
        'name',
        'domain',
        'age_group',
        'category',
        'multigroup',
        'active',
        'visible',
    ];

    protected function casts(): array
    {
        return [
            'age_group' => AgeGroupEnum::class,
            'category' => ChoirCategoryEnum::class,
            'multigroup' => 'boolean',
            'active' => 'boolean',
            'visible' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(ChoirProfile::class);
    }

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function choristers(): HasMany
    {
        return $this->hasMany(Chorister::class);
    }

    public function encounters(): HasMany
    {
        return $this->hasMany(Encounter::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
