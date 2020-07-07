<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function categories()
    {
        return $this->belongstoMany('App\Category', 'city_category');
}
}
