<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'choir_id',
        'name',
        'date',
        'time',
        'place',
        'manager_description',
        'chorister_description',
        'public_description',
        'is_presentation',
        'last_answer',
    ];

    protected $appends = ['day','month'];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'time' => 'datetime:H:i',
            'is_presentation' => 'boolean',
            'last_answer' => 'datetime',
        ];
    }

    public function getDayAttribute()
    {
        return intval($this->date->format('d'));
    }
    public function getMonthAttribute()
    {
        return intval($this->date->format('m'));
    }

    public function choir()
    {
        return $this->belongsTo(Choir::class);
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function choristers()
    {
        return $this->belongsToMany(Chorister::class)->withPivot('answer', 'answered_by', 'was_present')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
