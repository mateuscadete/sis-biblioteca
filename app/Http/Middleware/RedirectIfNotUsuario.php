<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotUsuario
{
 public function handle($request, Closure $next)
{
    if (!Auth::guard('usuario')->check() && !Auth::guard('web')->check()) {
        return redirect()->route('user.login');
    }

    return $next($request);
}

}
