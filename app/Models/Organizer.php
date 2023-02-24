<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organizer extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $fillable=[
        'user_id','organization_id'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
