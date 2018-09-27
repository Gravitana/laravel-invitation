<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Softon\SweetAlert\Facades\SWAL;

class AdminMiddleware
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
        if (!Auth::user() || !Auth::user()->isAdmin())
        {
            SWAL::message(__('Whoops!'), __('app.for_admin_only'),'error',['timer'=>5000]);
            return redirect()->back();
        }
        return $next($request);
    }
}
