<!--creates new Activity-->

@extends('layouts.layout')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ action('ActivityController@store') }}">
    @csrf


    <div>
        <input type="hidden" value="" name="user_id">
   
           <select name="user_id" id="users" >
            <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
           </select>
   
       </div>

    <div>
     <input type="hidden" value="" name="city_id">

        <select name="city_id" id="cities" >
            @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>

    </div>
        
    <div>
        <select name="category_id" id="categories" >
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>


    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Description</label>
        <input type="text" name="description" >
    </div>

    <div>
        <label>Group Size</label>
        <input type="text" name="group_size" >
    </div>

    <div>
        <label>Price</label>
        <input type="text" name="price" >
    </div>

    <div>
        <label>Date and Time of Activity</label>
        <input type="date_time" name="date_time" value="2020-02-12T19:30">
    </div>
    

    <div>
        <label>Address of activity</label>
        <input type="text" name="address" >
    </div>

    <div>
        <label>Postcode</label>
        <input type="text" name="postcode" >
    </div>

    <div>
        <label>Contact email</label>
        <input type="text" name="email" >
    </div>


    <button type="submit">Save my new activity!</button>
    </form>

@endsection

