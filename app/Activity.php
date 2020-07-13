<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    // One-To-Many (Inverse)
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // One-To-Many Relationship (Inverse, one Activity can only belong to one city)
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    // One-To-Many (Inverse, One Activity can only be created by one user)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Many-To-Many (One Activity can have multiple registered users)
    public function registered()
    {
        return $this->belongsToMany('App\User', 'activity_user');
    }
}
