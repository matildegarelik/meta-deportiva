<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Exceptions\ErrorException;

class Event extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'type',
        'clasification_id',
        'name',
        'start_date',
        'end_date',
        'description',
        'main_image',
        'location',
        'featured_event',
        'published',
        'fb_page',
        'ig_page',
        'website',
        'external_link',
        'results',
        'user_id',
        'organizer_id'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
    public function clasification()
    {
        return $this->belongsTo(Clasification::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }
    public function starter_price()
    {
        try{
            $categories = $this->hasMany(Category::class);
            $min_price = $categories->first()["price"];
            foreach($categories as $c){
                if($min_price>$c["price"]) $min_price=$c["price"];
            }
            return $min_price;
        }catch (ErrorException $e){
            return 0;
        }
    }
}
