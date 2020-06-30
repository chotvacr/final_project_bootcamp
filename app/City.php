<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function category()
    {
        return $this->belongstoMany('App\Category');
}
}
