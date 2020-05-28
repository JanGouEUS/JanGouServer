<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\Service;
use DB;


class ServiceController extends Controller
{
    public function createService(Request $request){
        $service = new Service;
        $service->idTaberna = $request->idTaberna;
        $service->services = $request->services;
        $procedure=$service->save();
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }

    public function getService(Request $request){   
        $services = DB::table('services')
         ->where('idTaberna', '=', $request->idTaberna)
         ->get();
         return response(['Services'=> $services],Response::HTTP_OK);
     }

     public function deleteService(Request $request){   
        $service=Service::where('id',$request->id)->delete();
         return response(['Service'=> $service],Response::HTTP_OK);
     }


}
