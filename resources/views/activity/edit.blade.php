
<!--edit Activity-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/editactivity.css') }}" >


@extends('layouts.layout')
@section('content')

    

    <form method="post" action="{{action('ActivityController@update', $activity->id )}}">
    @csrf
    <div class="form">
        <div>
        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
       </div>
       
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{$activity->name}}"> 
    </div>
    <div>
        <label>Description</label>
        <input type="text" name="description" value="{{$activity->description}}" >
    </div>
    <div>
        <label>Group Size</label>
        <input type="text" name="group_size" value="{{$activity->group_size}}" >
    </div>
    <div>
        <label>Price</label>
        <input type="text" name="price" value="{{$activity->price}}" >
    </div>
    <div>
        <label>Date and Time of Activity</label>
        <input type="datetime-local" name="date_time" value="YYYY-MM-DDTHH:MM" value="{{$activity->date_time}}">
    </div>
    <div>
        <label>Address of activity</label>
        <input type="text" name="address" value="{{$activity->address}}" >
    </div>
    <div>
        <label>Postcode</label>
        <input type="text" name="postcode"  value="{{$activity->postcode}}">
    </div>
    <div>
        <label>Contact email</label>
        <input type="text" name="email" value="{{$activity->email}}" >
    </div>

    <button type="submit">Save my new activity</button>
    </form>
    </div>
@endsection



