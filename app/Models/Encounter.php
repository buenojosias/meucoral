<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encounter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'choir_id',
        'group_id',
        'date',
        'theme',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function choir(): BelongsTo
    {
        return $this->belongsTo(Choir::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function choristers(): BelongsToMany
    {
        return $this->belongsToMany(Chorister::class)->withPivot(['attendance'])->withTimestamps();
    }

    public function presences(): BelongsToMany
    {
        return $this->belongsToMany(Chorister::class)->wherePivot('attendance','P');
    }

}
