<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
}
