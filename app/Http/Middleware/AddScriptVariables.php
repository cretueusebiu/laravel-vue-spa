<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Eusebiu\JavaScript\Facades\ScriptVariables;

class AddScriptVariables
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        ScriptVariables::add([
            'baseUrl' => url('/'),
            'locale' => app()->getLocale(),
            'data.user' => Auth::user(),
        ]);

        return $next($request);
    }
}
