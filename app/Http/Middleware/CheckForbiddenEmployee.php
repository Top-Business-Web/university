<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckForbiddenEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userType = Auth::user()->user_type;

        $restrictedRoles = ['window', 'treasury', 'division'];

        if (in_array($userType, $restrictedRoles)) {
            return redirect()->route('403');
        }

        return $next($request);
    }
}
