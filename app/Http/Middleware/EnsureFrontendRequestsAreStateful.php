<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful as Middleware;

class EnsureFrontendRequestsAreStateful extends Middleware
{
    /**
     * Determine if the given request is from the first-party application frontend.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function fromFrontend($request)
    {
        $domain = url('/');
        $domain = Str::replaceFirst('https://', '', $domain);
        $domain = Str::replaceFirst('http://', '', $domain);
        $domain = rtrim($domain, '/');

        config(['sanctum.stateful' => array_merge(config('sanctum.stateful', []), [$domain])]);

        return parent::fromFrontend($request);
    }
}
