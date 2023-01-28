<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'name',
        'father_last_name',
        'mother_last_name',
        'date_of_birth',
        'blood_type',
        'allergies',
        'gender',
        'team',
        'phone_number',
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
