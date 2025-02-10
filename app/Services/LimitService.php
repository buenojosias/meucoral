<?php

namespace App\Services;

use App\Models\Resource;
use Redirect;

class LimitService
{
    public static function checkLimit($attributes)
    {
        $attributes = json_decode($attributes, true);

        $resource = $attributes['resource'];
        $resourceInPlan = $attributes['resourceInPlan'];

        if ($resourceInPlan['limit'] === null) {
            return true;
        }

        $user = auth()->user();

        $resourceName = $resource['name'];

        $count = $user->$resourceName()->count();

        if ($count >= $resourceInPlan['limit']) {
            // return Redirect::route('panel.resource-attempt', ['resource' => $resource['id'], 'error' => 'limit']);
            return ['error' => 'limit', 'resourceId' => $resource['id']];
        }

        return true;
    }
}
