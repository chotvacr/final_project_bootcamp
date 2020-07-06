<?php

namespace App\Http\Controllers;
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

    public function show($activity_id)
    {
        
       $activity = Activity::findOrFail($activity_id);
       return view('activity.show', compact('activity'));
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
                'picture' => 'required|string|max:255',
                'date_time' => 'required|string|max:255',
                'adress' => 'required|string|max:255',
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
    
    
        $books_ids->$request->input('books');
            
        $bookshop->books()->sync($books_ids);
            
            
        return redirect('BookshopController@index');

    }

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
    
    
}