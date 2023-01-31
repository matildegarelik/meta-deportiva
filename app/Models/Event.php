<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=[
        'type',
        'clasification',
        'name',
        'start_date',
        'end_date',
        'description',
        'main_image',
        'location',
        'featured_event',
        'fb_page',
        'ig_page',
        'website',
        'external_link',
        'results',
        'user_id',
        'organizador_id'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
}
