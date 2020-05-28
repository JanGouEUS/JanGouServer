<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\FoodCardImage;
use Carbon\Carbon;
use DB;
use App\Taberna;


class ApiController extends Controller
{
    public function getTabernak(Request $request){
        $tabernak=DB::select('CALL getTabernasByLonLat (?,?,?,?)', 
        [
            $request->lat,
            $request->lon, 
            $request->how_many,
            $request->name
        ]
        );
        foreach ($tabernak as $taberna){
            $taberna->descriptions = json_decode($taberna->descriptions);
            $taberna->timetables = json_decode($taberna->timetables);
            $taberna->more_infos = json_decode($taberna->more_infos);
            $taberna->pay_procediments = json_decode($taberna->pay_procediments);
            $taberna->request_methods = json_decode($taberna->request_methods);
            $taberna->services = json_decode($taberna->services);
            $taberna->food_card_images = json_decode($taberna->food_card_images);
        }
        return $tabernak;
    }

    public function getTabernakJsonEcode(Request $request){
        $tabenak=DB::select('CALL getTabernasByLonLat (?,?,?,?)', 
        [
            $request->lat,
            $request->lon, 
            $request->how_many,
            $request->name
        ]
        );
        
        return json_encode($tabenak);
    }

    public function getTabernakEloquent(Request $request){  
            $idTaberna = DB::table('tabernas')
             
             ->paginate(100);
             return response(['idTaberna'=> $idTaberna],Response::HTTP_OK);
        
    }
    
}
