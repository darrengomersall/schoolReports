<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    public function classes ()
    {
        return $this->hasMany('App\ClassGroup');
    }

    public function head ()
    {
        return $this->hasOne('App\User', 'id', 'head_id');
    }

    public function pupils ()
    {
        return $this->hasManyThrough('App\Pupil', 'App\ClassGroup', 'grade_id', 'class_id', 'id');
    }

}
