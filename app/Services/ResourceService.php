<?php

namespace App\Services;

use App\Models\Resource;
use Cache;
use Redirect;

class ResourceService
{
    public static function checkResource($resource)
    {
        $user = auth()->user();

        $resource = Cache::remember("resource_{$resource}", 600, function () use ($resource) {
            return Resource::where('name', $resource)->firstOrFail();
        });

        $resourceInPlan = Cache::remember("plan_resource_{$user->plan_id}_{$resource->id}", 600, function () use ($user, $resource) {
            return \DB::table('plan_resource')
                ->where('plan_id', $user->plan_id)
                ->where('resource_id', $resource->id)
                ->first();
        });

        if (!$resourceInPlan) {
            // return Redirect::route('panel.resource-attempt', ['resource' => $resource->id, 'error' => 'unavailable']);
            return ['error' => 'unavailable', 'resourceId' => $resource->id];
        }

        return json_encode([
            'resource' => $resource,
            'resourceInPlan' => $resourceInPlan
        ]);
    }
}

// ADICIONAR ESTE CÓDIGO NAS CONFIGURAÇÃO DO USUÁRIO
// Se o usuário mudar de plano, invalida o cache anterior
// Cache::forget("plan_resource_{$user->plan_id}_{$resource->id}");

// ADICIONAR ESTE CÓDIGO NO CONTROLE DE PLANOS
// use Illuminate\Support\Facades\Cache;
// DB::table('plan_resource')->afterInsertOrUpdateOrDelete(function ($plan_id, $resource_id) {
//     Cache::forget("plan_resource_{$plan_id}_{$resource_id}");
// });
