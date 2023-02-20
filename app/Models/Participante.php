<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'user_id',
        'name',
        'father_last_name',
        'mother_last_name',
        'date_of_birth',
        'gender',
        'phone_number',

        'blood_type',
        'allergies',
        'team',

        'profile_picture',
        'ec_name',
        'ec_relationship',
        'ec_phone',
        
        'street_number',
        'area',
        'city',
        'zipcode',
        'state',
        'country'
    ];
}
