<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    public function subject_group ()
    {
        return $this->belongsTo('App\SubjectGroup');
    }

    public function marks ()
    {
        return $this->hasMany('App\Mark');
    }
}
