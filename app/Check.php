<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    public function hosts()
    {
        return $this->belongsTo('App\Host');
    }
}
