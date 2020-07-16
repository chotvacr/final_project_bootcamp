<!--Shows the details of one specific Activity-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/detail.css') }}" >

@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="detail">
        <div class="detail--headline">
            <h1 class="detail--headline__name">{{ $activity->name }}</h1>
            <p class="detail--headline__description"> This awaits you: {{ $activity->description }}</p>
            <br>
        </div>
    
        <div class="detail--facts">
            <p class="detail--facts__item">Available Places: {{$activity->group_size}}</p>
            <p class="detail--facts__item">Starts: {{$activity->date_time}}</p>
            <p class="detail--facts__item">Address: {{$activity->adress}}</p>
            <p class="detail--facts__item">Postcode: {{$activity->postcode}}</p>
            @if ($city->id == 1)
                <p class="detail--facts__item">Price in CZK: {{$activity->price}}</p>
            @elseif($city->id == 2)
                <p class="detail--facts__item">Price in EUR: {{$activity->price}}</p>
            @endif
        </div>
    
    
        <div class="detail--registration">
        <!--When being logged-in you can see a Register button that will register you to this activity-->
            @auth
            <form method="POST" action="{{ action('ActivityController@registerActivity') }}">
            @csrf
               
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                <input type="hidden" value="{{$activity->id}}" name="activity_id">
            
            <div class="button"><button class="btn" type="submit" >Register for this activity</button></div>
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
            <div class="detail--login__name"><a class="detail--login__link" href="/login">Login to take part</a></div>
        </div>
        <br>    
        @endguest
        
        <!--About Creator of Activity-->
        <div class="detail--about">
            @if ($owner !== null) 
            <h2>About {{ $owner->name }}:</h2>
            <p>{{ $owner->description }}</p>
            <p>Contact Me: {{ $activity->email }}</p>
            @endif
        </div> 
    
        <!-- More Activites created by that "Teacher"-->
        <div class="detail--related">
            <h2>More Activities by {{ $owner->name }}</h2>
            @foreach ($activities as $activity)
            <div class="detail--related__name"><a class="detail--related__link" href="{{ route('activity.detail', [$city->id, $category->id, $activity->id]) }}">{{ $activity->name }}</a></div>
            @endforeach
            
        </div>
    </div>
</div>

    
@endsection

