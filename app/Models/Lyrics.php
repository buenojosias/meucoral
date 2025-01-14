<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lyrics extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'song_id',
        'content',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
