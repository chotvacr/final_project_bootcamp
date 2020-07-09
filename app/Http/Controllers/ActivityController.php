<?php

namespace App\Http\Controllers;

use App\City; 
use App\User; 
use App\Activity;
use App\Category;


use Illuminate\Http\Request;

class ActivityController extends Controller
{
    
    public function index()
    {
        $activities = Activity::all(); 
        return view('activity.index', compact('activities')); 
    }
    

    public function show($category_id)
    {
        $category = Category::findOrFail($category_id); 
        $activities = Activity::where('category_id', $category_id)->get(); 

        return view('activity.index', compact('category', 'activities')); 

    }

    public function detail($activity_id, $user_id)
    {
        $activity = Activity::findOrFail($activity_id); 
        $user = User::findOrFail($user_id); 

        return view('activity.detail', compact('activity', 'user')); 
    }

    public function create($user_id)
    {
        $activities = Activity::all();
        $cities = City::all(); 
        $categories = Category::all(); 
        $user = User::findOrFail($user_id); 
        return view('activity.create', compact('activities', 'cities', 'categories', 'user'));
    }

    public function store(Request $request)
    { 
        $this->validate($request, 
            [
                'user_id' => 'required',
                'city_id' => 'required|max:255',
                'category_id' => 'required|max:255',
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'group_size' => 'required|int|max:255',
                'price' => 'required|int|max:255',
                // 'picture' => 'required|string|max:255',
                'date_time' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'postcode' => 'required|int',
                'email' => 'required|string|max:255',
            
            ]
        ); 

        $activity = new Activity;
        $activity->user_id= $request->input('user_id');
        $activity->city_id = $request->input('city_id');
        $activity->category_id = $request->input('category_id');
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->group_size = $request->input('group_size');
        $activity->price = $request->input('price');
        $activity->date_time = $request->input('date_time');
        $activity->postcode = $request->input('group_size');
        $activity->email = $request->input('email');
        $activity->save();
    
    
        //$activities_ids->$request->input('activities');
            
        //$bookshop->books()->sync($books_ids);
            
            
        return redirect('CityController@index');

    }

    
   
}