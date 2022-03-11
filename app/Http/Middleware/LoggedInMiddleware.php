<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(request()->session()->has('user') || request()->session()->has('admin')){
            return $next($request);
        }

        return redirect()->route('auth.index')->with('errorMessage', 'You need to be logged in first.');

    }
}
