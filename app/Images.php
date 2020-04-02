<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
   protected $fillable =['image_tittle','image_name','image_size','image_extension','image_description'];
}
