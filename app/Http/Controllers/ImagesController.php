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


class ImagesController extends Controller
{
    public function saveImage(Request $request){
        $imageName = $request->imageFunction.'.'.$request->type;
        Storage::putFileAs('public/tabernak/'.$request->idTaberna.'/', $request->image, $imageName);
        return Storage::url('public/tabernak/'.$request->idTaberna.'/'.$imageName);
        //jangou.eus/storage/tabernak/1111/imageLink.jpeg
    }
    public function deleteImage(Request $request){
        // public/tabernak/1111/imageLink.jpeg
        return Storage::delete($request->url);
    }
    public function saveCardImage(Request $request){
        $timeKey = Carbon::now()->timestamp;
        $hash = sha1($request->imageID.$timeKey);
        $imageName = $hash.'.'.$request->type;
        Storage::putFileAs('public/tabernak/'.$request->idTaberna.'/foodcards',$request->image, $imageName);
        $url=Storage::url('public/tabernak/'.$request->idTaberna.'/foodcards'.'/'.$imageName);
        $foodCardImage = new FoodCardImage;
        $foodCardImage->idTaberna=$request->idTaberna;
        $foodCardImage->image=str_replace('storage', 'public', $url);
        $foodCardImage->name=$imageName;
        $foodCardImage->key=$request->imageID;
        $foodCardImage->timeKey=$timeKey;
        $foodCardImage->save();
        return Storage::url('public/tabernak/'.$request->idTaberna.'/foodcards'.'/'.$imageName);
        //jangou.eus/storage/tabernak/1111/imageLink.jpeg
    }
    public function deleteCardImage(Request $request){
        $image=FoodCardImage::where('name',$request->name)->delete();
       return Storage::delete($request->url);
    }
    public function getImagesByIdTaberna(Request $request){   
        $images = DB::table('food_card_images')
         ->select('image')->where('idTaberna', '=', $request->idTaberna)
         ->get();
         return response(['images'=> $images],Response::HTTP_OK);
     }
}
