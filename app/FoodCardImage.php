<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FoodCardImage extends Model
{
    use Notifiable;

    protected $table = 'food_card_images';
    public $timestamps=true;
    /**
     * The attributes that are mass assignable.
     
     * @var array
     */
    protected $fillable = [
        'id','createDate','idTaberna','image','name','key','timeKey'
    ];
}



