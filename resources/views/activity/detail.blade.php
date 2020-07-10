<!--Shows the details of one specific Activity-->

@extends('layouts.layout')

@section('content')

<!--Example Pictures of that specific Activity-->
    <div class="activity--pictures__header">
        <img src="{{ asset('img/prague.jpg') }}" style="height: 100px">    
        <img src="{{ asset('img/prague.jpg') }}" style="height: 100px"> 
        <img src="{{ asset('img/prague.jpg') }}" style="height: 100px"> 
    </div> 

    <div class="activity--headline">
        <h1>{{ $activity->name }}</h1>
        @auth
        <button>show my list of activities</button>
        @endauth
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

<!--When being logged-in you can see a Register button that will register you to this activity-->
    @auth
    <form method="POST" action="{{ action('ActivityController@registerActivity') }}">
    @csrf
       
        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
        <input type="hidden" value="{{$activity->id}}" name="activity_id">
    
    <button type="submit">Register for this activity</button>
    </form>
    @endauth

<!--when visiting as a guest, you see a button to login / register on the website-->
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

