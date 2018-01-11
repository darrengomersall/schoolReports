<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    // cannot be called Class as it's a reserved word
    protected $table = 'classes';

    public function pupils ()
    {
        return $this->belongsToMany('App\Pupil','pupils_classes', 'class_id', 'pupil_id');
    }

    public function teacher ()
    {
        return $this->hasOne('App\User', 'id', 'teacher_id');
    }
}
