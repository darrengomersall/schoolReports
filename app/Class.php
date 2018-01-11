<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    //
    public function pupils ()
    {
        return $this->hasMany('App\Pupil');
    }

    public function teacher ()
    {
        return $this->hasOne('App\User', 'id', 'teacher_id');
    }

}
