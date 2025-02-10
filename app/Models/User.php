<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

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
        'selected_choir_id',
        'selected_choir_name'
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

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    public function choristers(): HasManyThrough
    {
        return $this->hasManyThrough(Chorister::class, Choir::class);
    }

    public function groups(): HasManyThrough
    {
        return $this->hasManyThrough(Group::class, Choir::class);
    }

    public function selectedChoir()
    {
        return $this->belongsTo(Choir::class, 'selected_choir_id');
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
