<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;





    //Relacion un a muchos
public function exercices()
{
    return $this->belongsTo('App\Models\Technologies');
}
}



