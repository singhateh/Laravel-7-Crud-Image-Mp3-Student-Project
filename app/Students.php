<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['firstname', 'lastname', 'gender', 'country', 'city', 'address'];
    protected $primaryKey = 'id';
    // public $timestamps = false;
}
