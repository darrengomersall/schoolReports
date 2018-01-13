<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    //
    public function current_class ()
    {
        return $this->belongsTo('App\ClassGroup');
    }

}
