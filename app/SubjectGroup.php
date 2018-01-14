<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectGroup extends Model
{
    //
    public function grade ()
    {
        return $this->belongsTo('App\Grade');
    }

    public function subjects ()
    {
        return $this->hasMany('App\Subject');
    }

}
