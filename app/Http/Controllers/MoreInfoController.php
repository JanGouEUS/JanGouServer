<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\MoreInfo;
use DB;


class MoreInfoController extends Controller
{
    public function createMoreInfo(Request $request){
        $moreinfo = new MoreInfo;
        $moreinfo->idTaberna = $request->idTaberna;
        $moreinfo->language = $request->language;
        $moreinfo->moreInfo = $request->moreInfo;
        $procedure=$moreinfo->save();
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }
    public function getMoreInfo(Request $request){   
        $moreInfo = DB::table('more_infos')
         ->where('idTaberna', '=', $request->idTaberna)
         ->get();
         return response(['MoreInfo'=> $moreInfo],Response::HTTP_OK);
     }
     public function updateMoreInfo(Request $request){
        $procedure= DB::table('more_infos')
        ->where('idTaberna', $request->idTaberna)
        ->where('language', $request->language)
        ->update([
            'moreInfo' => $request->moreInfo,
            ]);
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }

}
