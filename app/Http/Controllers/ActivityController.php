<?php

namespace App\Http\Controllers;

use App\City; 
use App\User; 
use App\Activity;
use App\Category;


use Illuminate\Http\Request;

class ActivityController extends Controller
{
    
    public function show($category_id, $city_id)
    {
        $city = City::findOrFail($city_id); 
        $category = Category::findOrFail($category_id); 
        $activities = Activity::where('category_id', $category_id)->get(); 

        return view('activity.show', compact('category', 'activities', 'city')); 

    }

    public function detail($city_id,$category_id,$activity_id)
    {
        $city = City::findOrFail($city_id); 
        $activity = Activity::findOrFail($activity_id); 
        //owner of activity
        $owner = $activity->user;
        
        $user = auth()->user(); 
         

        return view('activity.detail', compact('activity', 'city', 'owner','user')); 
    }

    public function create()
    {
        $activities = Activity::all();
        $cities = City::all(); 
        $categories = Category::all(); 
        $users = User::all(); 
       
        return view('activity.create', compact('activities', 'cities', 'categories', 'users'));
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
        $activity->address = $request->input('address');
        $activity->postcode = $request->input('group_size');
        $activity->email = $request->input('email');
        $activity->save();
    
    
        //$activities_ids->$request->input('activities');
            
        //$bookshop->books()->sync($books_ids);
            
            
        return redirect('/');

    }

    public function register(Request $request)
    { 
        $this->validate($request, 
            [
                'user_id' => 'required',
                'activity_id' => 'required',
               
            ]
        ); 

        $user_activity = new Activity;
        $user_activity->user_id= $request->input('user_id');
        $user_activity->activity_id = $request->input('activity_id');
       
        $user_activity->save();
    
    
        //$activities_ids->$request->input('activities');
            
        //$bookshop->books()->sync($books_ids);
            
            
        return redirect('activity.register');
    }

    // public function registerActivity(Request $request)
    // {
        
    //     $user_id = auth()->user(); 
    //     $activity = Activity::findOrFail($activity_id); 
            
    //     $activity_id = $request->input('activity_id');
    //     dd($activity_id)   ;
    //     $user_id->activities()->attach($activity_id);

    //     return redirect(action('ActivityController@registerActivity', $user_id));
    // }
   
}