<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'plan_id',
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
        'role',
        'active',
        'indicated_by',
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


    public function choirs(): HasMany
    {
        return $this->hasMany(Choir::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function config(): HasOne
    {
        return $this->hasOne(UserConfig::class);
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
