<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public function pupil ()
    {
        return $this->belongsTo('App\Pupil');
    }

    public function report_class ()
    {
        return $this->hasOne('App\ClassGroup', 'id', 'class_id');
    }



}
