<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cupon extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'code',
        'discount_amount',
        'percentage',
        'valid_from',
        'valid_to',
        'usage_limit',
        'event_id'
    ];
    public $timestamps = false;
    public function es_valido()
    {
        $valido = true;
        $curr_date = date('Y-m-d');
        if($this->valid_from>$curr_date || $this->valid_to<$curr_date) $valido=false;
        $usage = EventInscripto::where('cupon_id',$this->id)->count();
        if($this->usage_limit<=$usage) $valido=false;
        return $valido;
    }
}
