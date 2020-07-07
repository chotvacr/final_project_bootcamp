<?php

namespace App\Http\Controllers;

use App\City; 
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($city_id) 
    {
        $categories = Category::where(function ($query) use ($city_id) {
            $query->where('city_id', '=', $city_id); 
        })->get(); 
    }
}
