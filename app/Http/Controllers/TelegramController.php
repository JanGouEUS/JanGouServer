<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TelegramController extends Controller
{
    public function sendTelegramMezua(Request $request){
        $user = $request->user;
        $name = AUTH::user()->name;
        $email = AUTH::user()->email;
        $timeKey = Carbon::now()->timestamp; 
        $chat = new Chat;
        $chat->idChat =sha1($timeKey);
        $chat->send = $email ;
        $chat->to = 'admin' ;
        $chat->msg = $request->mezua;
        $chat->title=$request->izenburua;
        $chat->save();
       
        /** Telegram Bidali**/

                  $text = "
                            🚨 LAGUNTXAT 🚨
                  \n---------------------------------------
                  \n👤 Pertsona- {$name}              
                  \n📨 Eposta- {$email}
                  \n🔗 IP- {$request->ip()}
                  \n👉 Izenburua- \n{$request->izenburua}
                  \n💬 Mezua- \n{$request->mezua}
                  ";         
      
                  if(Telegram::sendMessage([
                      'chat_id' => '-486184720',
                      'parse_mode' => 'HTML',
                      'text' => $text,
                  ])){
                    return array('valid' => true);
                  }
          }
          public function sendTelegramError(Request $request){
            $name = AUTH::user()->name;
            $email = AUTH::user()->email;
           
            /** Telegram Bidali**/
    
                      $text = "
                                    ❌ ERROR ❌
                      \n---------------------------------------
                      \n👤 Pertsona- {$name}              
                      \n📨 Eposta- {$email}
                      \n🔗 IP- {$request->ip()}
                      \n💻 VIEW- \n{$request->view}
                      \n⚙️ FUNCTION- \n{$request->funtz}
                      \n❌ ERROR- \n{$request->error}
                      ";         
          
                      if(Telegram::sendMessage([
                          'chat_id' => '-425320044',
                          'parse_mode' => 'HTML',
                          'text' => $text,
                      ])){
                        return array('valid' => true);
                     }
              }
}
