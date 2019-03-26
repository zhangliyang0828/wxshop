<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Closure  $next
    //  * @return mixed
    //  */
    public function handle($request, Closure $next)
    {   
        $userid=session('userid');
        //echo($userid);exit;
        if(empty($userid)){
            return redirect('login');
        }
        return $next($request);
    }
}
