<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventInscripto extends Model
{
    //public $timestamps = false;
    protected $fillable = [
        'event_id','user_id','category_id','cupon_id'
    ];
}
