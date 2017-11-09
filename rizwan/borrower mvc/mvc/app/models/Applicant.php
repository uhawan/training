<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Applicant extends Eloquent
{
    //public $name;
    //public $fathers_name;
    //public $cnic;
  //  public $gender;
   // public $country;
   // public $province;
    //public $district;
    //public $address;
    //public $description;
    //public $status;
    public $timestamps=['created_at','updated_at'];

    protected $fillable=['name','fathers_name','cnic','gender','country','province','district','address','description','status'];

}