<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\Timetable;
use DB;


class TimetableController extends Controller
{
    public function createTimetable(Request $request){
        $timetable = new Timetable;
        $timetable->idTaberna = $request->idTaberna;
        $timetable->language = $request->language;
        $timetable->timetable = $request->timetable;
        $procedure=$timetable->save();
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }
    public function getTimetables(Request $request){   
        $timetables = DB::table('timetables')
         ->where('idTaberna', '=', $request->idTaberna)
         ->get();
         return response(['Timetables'=> $timetables],Response::HTTP_OK);
     }
     public function updateTimetable(Request $request){
        $procedure= DB::table('timetables')
        ->where('idTaberna', $request->idTaberna)
        ->where('language', $request->language)
        ->update([
            'timetable' => $request->timetable,
            ]);
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }
}
