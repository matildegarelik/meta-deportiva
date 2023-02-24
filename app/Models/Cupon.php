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
}
