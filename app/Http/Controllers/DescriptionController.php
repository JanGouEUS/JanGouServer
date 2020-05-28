<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\Description;
use DB;
use Auth;
use App\User;


class DescriptionController extends Controller
{
    public function createDescription(Request $request){
        $description = new Description;
        $description->idTaberna = $request->idTaberna;
        $description->language = $request->language;
        $description->description = $request->description;
        $procedure=$description->save();
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }
    public function getDescriptions(Request $request){   
        $descriptions = DB::table('descriptions')
         ->where('idTaberna', '=', $request->idTaberna)
         ->get();
         return response(['Descriptions'=> $descriptions],Response::HTTP_OK);
     }
     public function updateDescription(Request $request){
        $procedure= DB::table('descriptions')
        ->where('idTaberna', $request->idTaberna)
        ->where('language', $request->language)
        ->update([
            'description' => $request->description,
            ]);
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }
}
