<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UpdateUserOnlineStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $expireAt = now()->addMinutes(5);
            Cache::put('user-is-online-' . Auth::id(), true, $expireAt);
        }

        return $next($request);
    }
}
