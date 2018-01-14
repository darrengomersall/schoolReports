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

}
