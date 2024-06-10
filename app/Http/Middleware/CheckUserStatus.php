<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->type != User::Admin && ! auth()->user()->info->status == 1) {
            return redirect()->route('logout-user');
        }

        return $next($request);
    }
}
