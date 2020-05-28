<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Chat extends Model
{
    use Notifiable;

    protected $table = 'chats';
    public $timestamps=true;
    /**
     * The attributes that are mass assignable.
     
     * @var array
     */
    protected $fillable = [
        'id','createDate','idChat','send','to','msg','title'
    ];
}

