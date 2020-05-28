<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Taberna;
use DB;



class PdfController extends Controller
{
    public function seePdf(Request $request){ 
        $taberna = DB::table('tabernas')->where('idTaberna',$request->idTaberna)->first();
        // $taberna->qr = $request->qr;
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf', array('taberna' => $taberna));
        // ::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
        return $pdf->stream($taberna->name.$taberna->idTaberna.'.pdf');     
    }



    public function downloadPdf(Request $request){      
        // $id=$request->id;
        // $taberna = Taberna::find($id);  
        $taberna = DB::table('tabernas')->where('idTaberna',$request->idTaberna)->first();
        $taberna->qr = $request->qr;
        $pdf = PDF::loadView('pdf', array('taberna' => $taberna));
        return $pdf->download($taberna->name.$taberna->idTaberna.'.pdf'); 
        
    }


}
