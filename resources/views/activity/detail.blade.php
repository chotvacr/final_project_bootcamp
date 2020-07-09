<!--Shows the details of one specific Activity-->

@extends('layouts.layout')

@section('content')

    <div class="activity--pictures__header">
        <img src="{{ asset('img/prague.jpg') }}" style="height: 100px">    
        <img src="{{ asset('img/prague.jpg') }}" style="height: 100px"> 
        <img src="{{ asset('img/prague.jpg') }}" style="height: 100px"> 
    </div> 

    <div class="activity--headline">
        <h1>{{ $activity->name }}</h1>
        
        <button>Sign in</button>
        <button>show my list of activities</button>
    </div>

    <div class="activity--facts">
        <p>Group size: {{$activity->group_size}}</p>
        <p>Starts: {{$activity->date_time}}</p>
        <p>Where: {{$activity->adress}}</p>
        <p>Postcode: {{$activity->postcode}}</p>
        <p>Starts: {{$activity->date_time}}</p>
        <p>Rate per activity: {{$activity->price}}</p>
    </div>

    <div class="activity--description">
        <h2>Course Description</h2>
        <p>{{ $activity->description }}</p>
    </div>

    @auth
    <form method="post" action="{{ action('ActivityController@registerActivity') }}">
    @csrf
       
        <input type="hidden" value="" name="{{Auth::user()->id}}">
        <input type="hidden" value="" name="{{ $activity->id }}">
          


    <button type="submit">Register for this activity</button>
    </form>
    @endauth

    @guest
    <form method="get" action="/login">
    <button type="submit">Log in to register for this activity</button>
    </form>
    @endguest

    <div class="activity--about">
        <h2>About me</h2>
        <img src="" alt="">
        <p>{{ $owner->description }}</p>
        <p>Contact: {{ $activity->email }}</p>
    </div class="activity--related">
        <h2>More Activities by that teacher</h2>
    <div>

    </div>

    
@endsection

