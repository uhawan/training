<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class user extends Eloquent
{
    public $name;
    public $timestamps = ['created_at', 'updated_at'];
    public $fillable = ['username', 'password', 'email'];


}