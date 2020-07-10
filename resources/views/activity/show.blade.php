<!--shows all the Activites of one specific Category in one specific City-->

@extends('layouts.layout')
@section('content')

<h1>Activity detail </h1>


    @foreach ($activities as $activity)
    <div>
            
        <h2> <a href="{{ route('activity.detail', [$city->id, $category->id, $activity->id]) }}"> {{ $activity->name }}</a></h2>
        <p>Group size: {{$activity->group_size}}</p>
        <p>Starts: {{$activity->date_time}}</p>
        <p>Where: {{$activity->adress}}</p>
        <p>Postcode: {{$activity->postcode}}</p>
        <p>Starts: {{$activity->date_time}}</p>
        <p>Rate per activity: {{$activity->price}}</p>
        <p>Contact: {{ $activity->email }}</p>
        <p>Course Description: {{ $activity->description }}</p>
    </div>
        
    @endforeach

  
    

@endsection
