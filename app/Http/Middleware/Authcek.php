<?php

namespace App\Http\Middleware;

use Closure;

class Authcek
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
        $admin_id = session()->get('admin_id');

        if($admin_id != null)
        {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
