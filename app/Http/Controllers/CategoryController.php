<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::all(); 

    //     return view('category.index', compact('categories')); 
    // }
        public function index($city_id)
        {
    
        $city = City::with('categories')->findOrFail($city_id);
        $city =City::findOrFail($city_id);
        $city->load('categories');
        $categories=Category::all();

        return view('category.index', compact('city','categories'));
        }
}

