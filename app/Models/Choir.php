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
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ScopedBy(UserScope::class)]
class Choir extends Model
{
    use HasFactory;

    use DeleteChoir;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'domain',
        'age_group',
        'category',
        'total_chorists',
        'multigroup',
        'active',
        'visible',
    ];

    protected function casts(): array
    {
        return [
            'age_group' => AgeGroupEnum::class,
            'category' => ChoirCategoryEnum::class,
            'total_choristers' => 'integer',
            'multigroup' => 'boolean',
            'active' => 'boolean',
            'visible' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(ChoirProfile::class);
    }
}
