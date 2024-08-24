<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'choir_id',
        'author_id',
        'content',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function choir()
    {
        return $this->belongsTo(Choir::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function chorister()
    {
        return $this->belongsTo(Chorister::class);
    }
}
