<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name',
        'price',
        'availability',
        'age_to',
        'age_from',
        'gender',
        'event_id'
    ];
    public $timestamps = false;
    public function cupo_disponible()
    {
        return $this->availability - count(EventInscripto::where('category_id',$this->id)->get());
    }
    public function format_genero()
    {
        switch($this->gender){
            case "0":
                return "Todos";
            case "1":
                return "Masculino";
            case "2":
                return "Femenino";
        }
    }
    public function questions()
    {
        $qs= DB::table('questions')->where('category_id',$this->id)->orWhere(function($query) {
            $query->where('event_id',$this->event_id)
                  ->where('category_id',null);
        })->get();
        return $qs;
    }
}
