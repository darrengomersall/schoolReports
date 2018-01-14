<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    // cannot be called Class as it's a reserved word
    protected $table = 'classes';

    public function pupils ()
    {
        return $this->hasMany('App\Pupil', 'class_id', 'id');
    }

    public function teacher ()
    {
        return $this->hasOne('App\User', 'id', 'teacher_id');
    }

    public function grade ()
    {
        return $this->belongsTo('App\Grade');
    }
}
