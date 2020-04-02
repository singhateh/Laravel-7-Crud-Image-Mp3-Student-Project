<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mp3 extends Model
{
    protected $table = "mp3";

    protected $fillable = ['song_title','song_name','song_unique_name',
    'song_size','song_extension','album_name','album_year','artist_name','song_thumnail'];
}
