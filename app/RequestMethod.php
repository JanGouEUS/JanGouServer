<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class RequestMethod extends Model
{
    use Notifiable;

    protected $table = 'request_methods';
    public $timestamps=true;
    /**
     * The attributes that are mass assignable.
     
     * @var array
     */
    protected $fillable = [
        'id','createDate','idTaberna','title','method'
    ];
}


