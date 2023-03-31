<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventInscripto extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'event_id','user_id','category_id','cupon_id','estado'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
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
