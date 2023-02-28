<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exercices extends Model
{
    use HasFactory;


    public function course()
    {
        return $this->belongsToMany('App\Models\Courses');
    }

}
