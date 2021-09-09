<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user()->type;
        $currentRoutePrefix = explode('/', $request->route()->getPrefix());
        if (in_array($user, $this->userAccessRole()[$currentRoutePrefix[1]])) {
            return $next($request);
        }
        abort(401);
    }


    private function userAccessRole()
    {
        return [
            'admin' => [
                User::Admin
            ],
            'manager' => [
                User::Manager
            ],
            'teacher' => [
                User::Teacher
            ],
            'user' => [
                User::Normal
            ]
        ];
    }
}
