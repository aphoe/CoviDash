<?php

namespace App\Http\Middleware;

use Closure;

class CheckInstalled
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
        if($request->url() !== url('setup')){
            if (!file_exists(storage_path('framework/installed'))) {
                return redirect('setup');
            }
        }elseif($request->url() === url('setup')){
            if (file_exists(storage_path('framework/installed'))) {
                abort(404);
            }
        }
        return $next($request);
    }
}
