<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model
{
    use SoftDeletes;
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

    public function datos_completos(){
        $result = true;
        if(!$this->name || $this->name=='') $result=false;
        if(!$this->father_last_name || $this->father_last_name=='') $result=false;
        if(!$this->mother_last_name || $this->mother_last_name=='') $result=false;
        if(!$this->date_of_birth || $this->date_of_birth=='') $result=false;
        if(!$this->gender || $this->gender=='') $result=false;
        if(!$this->phone_number || $this->phone_number=='') $result=false;
        if(!$this->ec_name || $this->ec_name=='') $result=false;
        if(!$this->ec_relationship || $this->ec_relationship=='') $result=false;
        if(!$this->ec_phone || $this->ec_phone=='') $result=false;
        if(!$this->street_number || $this->street_number=='') $result=false;
        if(!$this->area || $this->area=='') $result=false;
        if(!$this->city || $this->city=='') $result=false;
        if(!$this->zipcode || $this->zipcode=='') $result=false;
        if(!$this->state || $this->state=='') $result=false;
        if(!$this->country || $this->country=='') $result=false;
        return $result;
    }

    public function edad(){
        //explode the date to get year, month and day
        $birthDate = explode("-", $this->date_of_birth);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));
        return $age;
    }
}
