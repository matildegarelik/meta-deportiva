<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'user_id','organization_id'
    ];
}
