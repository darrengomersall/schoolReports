<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    //
    public function current_class ()
    {
        return $this->belongsTo('App\ClassGroup', 'class_id', 'id', 'class_id');
    }

    public function classes ()
    {
        return $this->belongsToMany('App\ClassGroup','pupils_classes', 'pupil_id    ', 'class_id');

    }

    public function reports ()
    {
        return $this->hasMany('App\Report');
    }

}
