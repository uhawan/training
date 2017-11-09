<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Applicant extends Eloquent
{
    public $timestamps = false;
    public $fillable = ['name','father_name','cnic','gender','country','province','districts','address','created_on','updated_on','status','incidence_id'];
    public $id;
    public $name;
    public $fathername;
    public $cnic;
    public $gender;
    public $country;
    public $province;
    public $districts;
    public $address;
    public $description;
    public $created_on;
    public $updated_on;
    public $status;
    public $incidence_id;

    public function incidences()
    {
        return $this->hasMany('\app\models\incidence');
    }

}