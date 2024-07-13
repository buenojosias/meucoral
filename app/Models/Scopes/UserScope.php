<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class UserScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->when(!auth()->user()->admin, function($q) {
            $q->where('user_id', auth()->user()->id);
        });
    }
}
