<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;
use DB;

class IsCreate
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
        if(count($idTaberna)!=0){
            return redirect('/foodcard/upload');  
        }else{
            //return redirect('/taberna/create');  
            return $next($request);
        }
        
    }
}
