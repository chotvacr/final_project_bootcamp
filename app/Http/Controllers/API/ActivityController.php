<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activity;


class ActivityController extends Controller
{
    public function index()
    {
        $activity = Activity::orderBy('name')
            ->limit(5)
            ->get();
      
    dd($activity);
    
}

       
}

