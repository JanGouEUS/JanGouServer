<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\Taberna;
use DB;
use Auth;
use App\User;

class TabernaController extends Controller
{
    public function createTaberna(Request $request){
        // return response(['image'=> $request->imagelink,'logo'=> $request->logolink],Response::HTTP_OK);

        $taberna = new Taberna;
        $taberna->idTaberna = $request->idTaberna;
        $taberna->key = $request->key;
        $taberna->timeKey = $request->timeKey;
        $taberna->admin = Auth::user()->email;
        $taberna->name = $request->name;
        $taberna->address = $request->address;
        $taberna->latitude = $request->latitude;
        $taberna->longitude = $request->longitude;
        $taberna->web = $request->web;
        $taberna->email = $request->email;
        $taberna->telephone = $request->telephone;
        $taberna->facebook = $request->facebook;
        $taberna->twitter = $request->twitter;
        $taberna->instagram = $request->instagram;
        $taberna->telegram = $request->telegram;
        $taberna->imagelink = $request->imagelink;
        $taberna->logolink = $request->logolink;
        $procedure=$taberna->save();
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }
    public function getTabernaID(Request $request){   
       $idTaberna = DB::table('tabernas')
        ->select('idTaberna')->where('admin', '=', Auth::user()->email)
        ->get();
        return response(['idTaberna'=> $idTaberna],Response::HTTP_OK);
    }
    public function getTaberna(Request $request){   
        $taberna = DB::table('tabernas')
         ->where('admin', '=', Auth::user()->email)
         ->get();
         return response(['Taberna'=> $taberna],Response::HTTP_OK);
     }


            public function updateTaberna(Request $request){
                $procedure= DB::table('tabernas')
                ->where('idTaberna', $request->idTaberna)
                ->update([
                    'name' => $request->name,
                    'address'=>$request->address,
                    'latitude'=>$request->latitude,
                    'longitude' => $request->longitude,
                    'web' => $request->web,
                    'email' => $request->email,
                    'telephone' => $request->telephone,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'telegram' => $request->telegram,
                    'imagelink' => $request->imagelink,
                    'logolink' => $request->logolink,
                    ]);
                return response(['procedure'=> $procedure,],Response::HTTP_OK);
            }
}
