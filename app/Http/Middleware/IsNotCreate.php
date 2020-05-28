<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;
use DB;

class IsNotCreate
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
        $idTaberna = DB::table('tabernas')
        ->select('idTaberna')->where('admin', '=', Auth::user()->email)
        ->get();
        if(count($idTaberna)==0){
            return redirect('/taberna/create');  
        }else{
            
            return $next($request);
        }
        
    }
}
