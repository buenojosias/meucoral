<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'resources',
        'price'
    ];

    protected function casts(): array
    {
        return [
            'resources' => 'array',
            // 'price' => 'decimal'
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot(['cost_change','final_cost','comment']);
    }
}
