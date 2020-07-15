<?php

namespace App\Http\Controllers;

use App\City; 
use App\User; 
use App\Activity;
use App\Category;
use DB; 


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 

class ActivityController extends Controller
{
    
    public function show( $city_id,$category_id)
    {
        $city = City::findOrFail($city_id); 
        $category = Category::findOrFail($category_id); 
        /*
        $activities = Activity::where([
            ['city_id', $city_id], 
            ['category_id', $category_id], 
        ])->get();
        */ 

        return view('welcome', compact('city', 'category')); 

    }

    public function detail($city_id,$category_id,$activity_id)
    {
        $category = Category::findOrFail($category_id);
        $city = City::findOrFail($city_id); 
        $activity = Activity::findOrFail($activity_id); 
        //owner of activity
        $owner = $activity->user;
        
        $user = auth()->user(); 
        // return $activity; 

        return view('activity.detail', compact('activity', 'city', 'owner','user', 'category')); 
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
//   Registration of activity by participant - creation of line in pivot table user_activity 
    public function registerActivity(Request $request)
    {
        
        $user = auth()->user(); 
        $activity_id = $request->input('activity_id');
        $activity = Activity::findOrFail($activity_id); 
       
        if ($user->registered()->where('activity_id', $activity_id)->exists())
        {
           return redirect()->back()->with('alert', 'Sorry, you are registered!');
        }
        elseif ($user->registered()->where('activity_id', $activity_id)->doesntExist())
        {
           
            $user->registered()->attach($activity_id);
            $activity->decrement('group_size'); 
            DB::table('activities')->update(["group_size"=>DB::raw("greatest(group_size - 1, 0)")]);
            return redirect()->back()->with('alert', 'registered!');
        }
        
        return redirect(action('ActivityController@detail', [$activity->city_id,$activity->category_id,$activity->id ]));
    }
// Owner of Activity deletes a complete Activity  
public function removeActivity(Request $request){
        $user = auth()->user(); 
        $activity_id = $request->input('activity_id');
        $activity = Activity::findOrFail($activity_id);
        
        $activity->delete();
        return redirect(action('ProfileController@show', $user->id));;
    }


// This is activity that participant (user) remove from his registered activity  - delete line in pivot table user_activity
    public function removeRegistration(Request $request)
    {
        $user = auth()->user(); 
        $activity_id = $request->input('activity_id');
        $activity = Activity::findOrFail($activity_id); 
       
        $user->registered()->detach($activity_id);
        $activity->increment('group_size'); 
        
        return redirect(action('ProfileController@show', $user->id));
    }
  
    public function search(Request $request)
    {
        
        $activity_input = $request->input('activity_input'); 
        $city_id = $request->input('city_id'); 
        $category_id = $request->input('category_id'); 
        
        $activities = Activity::where([
            ['city_id', $city_id], 
            ['category_id', $category_id], 
            ['name', 'LIKE', '%' . $activity_input . '%'],
        ])->get(); 
        
        $city = City::findOrFail($city_id); 
        $category = Category::findOrFail($category_id);

        return view('activity.show', compact('category', 'activities', 'city')); 

    }

    public function edit($activity_id)
    {   $user = auth()->user(); 
        
        
        $activity = Activity::findOrFail($activity_id);


        return view('activity.edit', compact('user', 'activity'));
    }

    public function update($activity_id, Request $request){
        $user = auth()->user(); 

        $activity = Activity::findOrFail($activity_id);

        $activity->user_id= $request->input('user_id');
        // $activity->city_id = $request->input('city_id');
        // $activity->category_id = $request->input('category_id');
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->group_size = $request->input('group_size');
        $activity->price = $request->input('price');
        $activity->date_time = $request->input('date_time');
        $activity->address = $request->input('address');
        $activity->postcode = $request->input('group_size');
        $activity->email = $request->input('email');
        $activity->save();

        return redirect('/profile/' . $user->id);
    }



    
}