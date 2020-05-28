<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;
use DB;
use Jenssegers\Agent\Agent;

class IsAndroid
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
        if($agent->isAndroidOS()){
            return redirect('https://play.google.com/store/apps/details?id=eus.skura.jangou&hl=es_419');  
        }else{
            return $next($request);
        }
        
    }
}
