<!--Shows the details of one specific Activity-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/activity.detail.css') }}" >

@extends('layouts.layout')

@section('content')

<div class="detail--container">
    <!--Example Pictures of that specific Activity-->
    <div class="detail--pictures">
        <img class="detail--picture" src="{{ asset('img/prague.jpg') }}" style="height: 100px">    
        <img class="detail--picture" src="{{ asset('img/prague.jpg') }}" style="height: 100px"> 
        <img class="detail--picture" src="{{ asset('img/prague.jpg') }}" style="height: 100px"> 
    </div> 

    <div class="detail--headline">
        <h1 class="headline--name">{{ $activity->name }}</h1>
        <p class="headline--description">{{ $activity->description }}</p>
        <br>
    </div>

    <div class="detail--facts">
        <p class="detail--fact">Available Places: {{$activity->group_size}}</p>
        <p class="detail--fact">Starts: {{$activity->date_time}}</p>
        <p class="detail--fact">Address: {{$activity->adress}}</p>
        <p class="detail--fact">Postcode: {{$activity->postcode}}</p>
        <p class="detail--fact">Price: {{$activity->price}}</p>
    </div>


    <div class="detail--registration">
    <!--When being logged-in you can see a Register button that will register you to this activity-->
        @auth
        <form method="POST" action="{{ action('ActivityController@registerActivity') }}">
        @csrf
           
            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
            <input type="hidden" value="{{$activity->id}}" name="activity_id">
        
        <button class="registration--button" type="submit">Register for this activity</button>
        @if (session('alert'))
            <div class="alert alert-success">
                {{ session('alert') }}
            </div>
        @endif
        </form>
        @endauth
    </div>
    <br>

    @guest
    <div class="detail--login">
        <a class="login--link" href="/login">Login to take part</a>  
    </div>
    <br>    
    @endguest
    
    
    <div class="detail--about">
        @if ($owner !== null) 
        <h2>About me</h2>
        <img src="" alt="">

        <p>{{ $owner->description }}</p>
        <p>Contact: {{ $activity->email }}</p>
        @endif
    </div> 

    <div class="detail--related">
        <h2>More Activities by that teacher</h2>
        <p>{{ $owner->activity_name }}</p>
    </div>
</div>
    
@endsection

