<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if(! in_array(Auth::user()->role->value, ['manager', 'superadmin']))
            return abort(403, 'Acesso negado');

        if(! Auth::user()->active)
            return abort(403, 'Usuário desativado');

        return $next($request);
    }
}
