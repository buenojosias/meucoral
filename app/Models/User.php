<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'indicated_by',
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
        'role',
        'active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'active' => 'boolean',
            'role' => UserRole::class,
        ];
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class)->withPivot(['cost_change','final_cost','comment']);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'indicated_by', 'id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(User::class, 'indicated_by', 'id');
    }
}
