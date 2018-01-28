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

    public function subject_groups ()
    {
        return $this->hasMany('App\SubjectGroup');
    }

    public function teachers ()
    {
        //return $this->hasManyThrough('App\User','App\ClassGroup','grade_id', 'id', 'id');
    }

}
