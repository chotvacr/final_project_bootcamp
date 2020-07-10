<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function city()
    {
        return $this->belongsTo('App\city');
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function registered()
    {
        return $this->belongsToMany('App\user', 'activity_user');
    }
}
