
@extends('layouts.layout')
@section('content')

<h1>Activity detail </h1>


        <div>

            <h2>{{ $activity->name }}</h2>
            <p>Group size: {{$activity->group_size}}</p>
            <p>Starts: {{$activity->date_time}}</p>
            <p>Where: {{$activity->adress}}</p>
            <p>Postcode: {{$activity->postcode}}</p>
            <p>Starts: {{$activity->date_time}}</p>
            <p>Rate per activity: {{$activity->price}}</p>
            <p>Contact: {{ $activity->email }}</p>
            <p>Course Description: {{ $activity->description }}</p>
        </div>
         <button href="activity/register">register for this activity</button>
  
    

@endsection
