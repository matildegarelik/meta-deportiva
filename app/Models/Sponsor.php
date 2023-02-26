<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponsor extends Model
{
    protected $fillable=[
        'name',
        'image',
        'event_id'
    ];
    public $timestamps = false;
}
