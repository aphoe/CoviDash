<?php

namespace App\Http\Middleware;

use Closure;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::check() && \Auth::user()->blocked && \Auth::user()->email !== config('project.admin_email')){
            \Auth::logout();
            return redirect('login')->with('theme-warning', 'Your account has been blocked, please contact the HR for more information');
        }
        return $next($request);
    }
}
