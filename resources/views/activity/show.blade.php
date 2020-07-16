<!--shows all the Activites of one specific Category in one specific City-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}" >


@extends('layouts.layout')

@section('content')


<div class="ad"> 
    <h1>Activity detail </h1>


    @foreach ($activities as $activity)
    <div class="activitydetail">
        <div class="activitydetail__header">   
            <h2>
                <a href="{{ route('activity.detail', [$city->id, $category->id, $activity->id]) }}"> {{ $activity->name }}</a>
            </h2>
        </div> 
        <div class="activitydetail__info">
            <p>Group size: {{$activity->group_size}}</p>
            <p>Starts: {{$activity->date_time}}</p>
            <p>Where: {{$activity->adress}}</p>
            <p>Postcode: {{$activity->postcode}}</p>
            <p>Starts: {{$activity->date_time}}</p>
            <p>Rate per activity: {{$activity->price}}</p>
            <p>Contact: {{ $activity->email }}</p>
            <p>Course Description: {{ $activity->description }}</p>
        </div>
    </div>
        
    @endforeach

  </div>
    

@endsection
