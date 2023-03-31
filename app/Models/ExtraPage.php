<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraPage extends Model
{
    protected $fillable=[
        'nombre','content','menu'
    ];
    public $timestamps = false;
    protected $table = 'extra_pages';
}