<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_cost',
        'payment_cycle',
        'discount',
        'final_cost',
        'last_payment',
        'next_payment',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'last_payment' => 'date',
            'next_payment' => 'date'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
