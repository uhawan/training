<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class user extends Eloquent
{
    public $name;
    public $timestamps = ['created_at', 'updated_at'];
    protected $fillable = ['username', 'password', 'email'];
}