<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;




class UserController extends Controller
{
    public function changePass(Request $request){
        if($request->pass == ''){
            return array('valid' => false); 
        }
        DB::table('users')
        ->where('email', Auth::user()->email )
        ->update(['password' => Hash::make($request->pass)]);
        return array('valid' => true);  
    }
}







