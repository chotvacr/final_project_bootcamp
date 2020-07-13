<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function categories()
    {
        return $this->belongstoMany('App\Category', 'city_category');
    }

    // One-To-Many (one city can have multiple activites)
    public function activities()
    {
        return $this->hasMany('App\Activity'); 
    }
}
