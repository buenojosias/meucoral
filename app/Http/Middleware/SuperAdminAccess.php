<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role->value !== 'superadmin')
            return redirect('/admin');

        return $next($request);
    }
}
