<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait DeleteChoir
{
    public static function bootDeleteChoir()
    {
        static::deleting(function ($model) {
            $user = auth()->user();
            if ($user->selected_choir_id === $model->id) {
                $user->selected_choir_id = null;
                $user->selected_choir_name = null;
                $user->save();
            }
        });

        static::forceDeleting(function ($model) {
            $user = auth()->user();
            if ($user->selected_choir_id === $model->id) {
                $user->selected_choir_id = null;
                $user->selected_choir_name = null;
                $user->save();
            }
            if ($model->profile->logo && Storage::exists('logos/' . $model->profile->logo)) {
                Storage::delete('logos/' . $model->profile->logo);
            }
        });

        static::restoring(function ($model) {
            $user = auth()->user();
            $user->selected_choir_id = $model->id;
            $user->selected_choir_name = $model->name;
            $user->save();
        });
    }
}
