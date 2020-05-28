<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Taberna extends Model
{
    use Notifiable;

    protected $table = 'tabernas';
    public $timestamps=true;
    /**
     * The attributes that are mass assignable.
     
     * @var array
     */
    protected $fillable = [
        'id','createDate','idTaberna','key','timeKey','admin','name','address','latitude','longitude','web','email','telephone','facebook','twitter','instagram','telegram','imagelink','logolink',
    ];
}