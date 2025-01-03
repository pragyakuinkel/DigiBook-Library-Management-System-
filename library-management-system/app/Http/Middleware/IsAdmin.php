<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// This is to check the admin role so if the user tries to access admin pages redirects to home
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // fetch user info
        $users = Auth::user();

        // if the user is_admin is true then
        if ($users->is_admin) {
            return $next($request);
        }

        // redirect to home page
        return redirect('/');
    }
}
