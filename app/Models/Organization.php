<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'name','website','fb_page','ig_page','user_id'
    ];

    public function organizers()
    {
        return $this->hasMany(Organizer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
