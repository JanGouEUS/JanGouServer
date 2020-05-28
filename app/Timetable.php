<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Timetable extends Model
{
    use Notifiable;

    protected $table = 'timetables';
    public $timestamps=true;
    /**
     * The attributes that are mass assignable.
     
     * @var array
     */
    protected $fillable = [
        'id','createDate','idTaberna','language','timeTable'
    ];
}
