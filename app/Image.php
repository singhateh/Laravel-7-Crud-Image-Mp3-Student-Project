<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $table = "image";

   protected $fillable = ['image_title','image_name',
                        'image_size','image_extension'];
}
