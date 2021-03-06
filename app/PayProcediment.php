<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PayProcediment extends Model
{
    use Notifiable;

    protected $table = 'pay_procediments';
    public $timestamps=true;
    /**
     * The attributes that are mass assignable.
     
     * @var array
     */
    protected $fillable = [
        'id','createDate','idTaberna','method'
    ];
}

