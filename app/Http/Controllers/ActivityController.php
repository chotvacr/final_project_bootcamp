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

    public function create()
    {
        $activities = Activity::all();
        $cities = City::all(); 
        $categories = Category::all(); 
        return view('activity.create', compact('activities', 'cities', 'categories'));
    }

    public function store(Request $request)
    { 
        $this->validate($request, 
            [
                'city_id' => 'required|bigint|max:255',
                'category_id' => 'required|bigint|max:255',
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'group_size' => 'required|int|max:255',
                'price' => 'required|int|max:255',
                // 'picture' => 'required|string|max:255',
                'date_time' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'postcode' => 'required|int|max:255',
                'email' => 'required|string|max:255',
            
            ]
        ); 

        $activity = new Activity;
        $activity->city_id = $request->input('city_id');
        $activity->category_id = $request->input('category_id');
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->group_size = $request->input('group_size');
        $activity->save();
    
    
        //$activities_ids->$request->input('activities');
            
        //$bookshop->books()->sync($books_ids);
            
            
        return redirect('CityController@index');

    }

    /*

    public function addBook($bookshop_id, Request $request)
    {
        $bookshop =Bookshop::findOrFail($bookshop_id);
        $book_id =$request->input('book_id');
        $bookshop->books()->attach($book_id);
    
        return redirect(action('BookshopController@show', $bookshop->id));
    }
    
    public function removeBook($bookshop_id, Request $request)
    {
        $bookshop =Bookshop::findOrFail($bookshop_id);
        $book_id =$request->input('book_id');
        $bookshop->books()->detach($book_id);
    
        return redirect(action('BookshopController@show', $bookshop->id));
    }
    */
    
}