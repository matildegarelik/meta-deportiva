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
    public $timestamps = false;
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function participante()
    {
        return Participante::where('user_id',$this->user_id)->get()->first();
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function cupon()
    {
        return $this->belongsTo(Cupon::class);
    }
}
