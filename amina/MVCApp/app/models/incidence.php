<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class Incidence extends Eloquent
{
    // protected $fillable = ['name','father_name'];
    public $id;
    public $title;
    public $created_on;
    public $updated_on;
    public $status;


}