<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\PayProcediment;
use DB;


class PayController extends Controller
{
    public function createPay(Request $request){
        $payProcediment = new PayProcediment;
        $payProcediment->idTaberna = $request->idTaberna;
        $payProcediment->method = $request->method;
        $procedure=$payProcediment->save();
        return response(['procedure'=> $procedure,],Response::HTTP_OK);
    }
    public function getPay(Request $request){   
        $pays = DB::table('pay_procediments')
         ->where('idTaberna', '=', $request->idTaberna)
         ->get();
         return response(['Pays'=> $pays],Response::HTTP_OK);
     }

     public function deletePay(Request $request){   
        $pays=PayProcediment::where('id',$request->id)->delete();
         return response(['Pays'=> $pays],Response::HTTP_OK);
     }

}
