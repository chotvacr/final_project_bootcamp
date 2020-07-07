<?php

namespace App\Http\Controllers;

use App\Category; 
use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index() 
    {
        $cities = City::all(); 
        return view('city.index', compact('cities')); 
    }

    public function show($city_id) 
    {
        
        $city = City::findOrFail($city_id); 
        $categories = $city->categories; 
        dd($categories); 
        
    }
}
