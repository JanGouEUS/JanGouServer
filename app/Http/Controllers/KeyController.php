<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use Carbon\Carbon;


class KeyController extends Controller
{
    public function generateKey(Request $request){
        $timeKey = Carbon::now()->timestamp; 
        $hash = sha1($request->key.$timeKey);
        return response(['hash'=> $hash,'timeKey'=>$timeKey,],Response::HTTP_OK);
    }
   
  
}
