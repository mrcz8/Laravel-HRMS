<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class rank
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $rank)
    {
        if($rank =='admin' && Auth::user()->rank != 'admin'){
            abort();
        }
        elseif($rank =='staff' && Auth::user()->rank != 'staff'){
            abort();
        }
        return $next($request);
    }
}
