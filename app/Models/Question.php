<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $fillable=[
        'type',
        'content',
        'event_id',
        'required',
        'order',
        'options'
    ];
}
