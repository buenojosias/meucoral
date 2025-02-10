<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\ResourceAttempt;
use Illuminate\Http\Request;

class ResourceAttemptController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $error = $request->error;
        $resource = Resource::findOrFail($request->resource);

        if ($resource) {
            ResourceAttempt::create([
                'resource_id' => $resource->id,
                'user_id' => $user->id,
                'error' => $error,
            ]);
        }

        return view('panel.resource-attempt', compact('error', 'resource'));
    }
}
