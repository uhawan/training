<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Applicant extends Eloquent
{
   // protected $fillable = ['name','father_name'];
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
        return $this->hasMany('MVCApp\app\models\incidence.php');
    }

}