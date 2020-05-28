<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\RequestMethod;
use DB;


class RequestController extends Controller
{
    public function createRequest(Request $request){
        $requestMethod = new RequestMethod;
        $requestMethod->idTaberna = $request->idTaberna;
        $requestMethod->title = $request->title;
        $requestMethod->method = $request->method;
        $procedure=$requestMethod->save();
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }

    public function getRequests(Request $request){   
        $requests = DB::table('request_methods')
         ->where('idTaberna', '=', $request->idTaberna)
         ->get();
         return response(['Requests'=> $requests],Response::HTTP_OK);
     }

     public function deleteRequests(Request $request){   
        $requests=RequestMethod::where('id',$request->id)->delete();
         return response(['Requests'=> $requests],Response::HTTP_OK);
     }


}
