<?php

namespace App\Http\Middleware;

use App\Invite;
use Closure;
use Request;
use Softon\SweetAlert\Facades\SWAL;

class InviteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Request::input('invite_token')) // может быть передан не только в GET
        {
            SWAL::message(__('app.invite.invite_only'),__('app.invite.notice_text'),'error',['timer'=>5000]);
            return redirect()->back();
        }
    
        $token  = $request->input('invite_token');
        $invite = Invite::getInviteByToken($token);
    
        if (!$invite)
        {
            SWAL::message(__('Whoops!'), __('app.invite.token_not_relevant'),'error',['timer'=>5000]);
            return redirect()->back();
        }
    
        return $next($request);
    }
}
