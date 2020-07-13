<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activity;


class ActivityController extends Controller
{
    public function index(Request $request)
    {

        $city_id = $request->input('city_id');
        $activity_id = $request->input('activity_id');

        $activity = Activity::orderBy('name')
            ->limit(5)
            ->get();
      
    return $activity;
 }

       
}

