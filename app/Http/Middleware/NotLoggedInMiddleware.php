<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotLoggedInMiddleware
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
        if(request()->session()->has('user')){
            return redirect()->route('posts.index')->with('errorMessage', 'You are already logged in.');
        }

        return $next($request);


    }
}
