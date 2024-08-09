<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kin extends Model
{
    use HasFactory;

    protected $table = 'kins';

    protected $fillable = [
        'chorister_id',
        'name',
        'kinship',
        'birthdate',
        'profession',
        'is_singer',
        'is_instrumentalist',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'is_singer' => 'boolean',
        'is_instrumentalist' => 'boolean',
    ];

    public function chorister()
    {
        return $this->belongsTo(Chorister::class);
    }
}
