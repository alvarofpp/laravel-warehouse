<?php

namespace App\Http\Middleware;

use Closure;
use App\Facades\Perfil;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (! in_array(Perfil::tipo(), $roles)) {
            return redirect('/');
        }

        return $next($request);
    }
}
