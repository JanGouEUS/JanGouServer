<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;
use DB;
use Jenssegers\Agent\Agent;

class IsIOS
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
        $agent = new Agent();
        if($agent->is('iPhone')){
            return redirect('https://itunes.apple.com/us/app/keynote/id1513820744?mt=8');  
        }else{
            return $next($request);
        }
        
    }
}
