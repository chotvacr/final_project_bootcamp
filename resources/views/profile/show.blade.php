<link rel="stylesheet" type="text/css" href="{{ asset('css/profilepage.css') }}" >


@extends('layouts.layout')



 @section('content')
    
    @auth
        <div class="personalinfo">
            <h1 class="personalinfo__welcome">Welcome {{Auth::user()->name}}</h1>

            <div>
                <h2>Personal Details: </h2>
                
                <p>{{Auth::user()->description}}</p>
                
                <form action="{{ route('profile.edit', [$user->id]) }}">
                <button type="submit">Edit information about you</button> 
                </form>
                <!-- <a href="{{ route('profile.edit', [$user->id]) }}">Edit information about you</a> -->
            </div>
        </div>

        <div class="activities">
            <div class="activities__createdactivities">
                <h2>My activities </h2>
                @foreach ($activities as $activity)
                    <div class="activities__activity">
                        <h3>{{ $activity->name }}</h3>
                        <p>{{$activity->date_time}}</p>
                        <p>{{$activity->address}}</p>
                        <!-- <p>{{ $activity->description }}</p> -->
                    </div>
                    <div class="activities__buttons">
                        <form action="{{ action('ActivityController@removeActivity', 'Auth::user()->id', 'Auth::activity()->id' ) }}" method="post">
                            @csrf
                            <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                            <button type="submit">Remove Activity</button>
                        </form>
                        <form action="{{ route('activity.edit', [$activity->id]) }}">
                            <button type="submit">Edit this activity</button>
                        </form>
                    </div>
                   
                @endforeach
            </div>

            <div class="activities__registeredactivities">
                    <h2>My registered activities </h2>
                @foreach ($registered as $activity)
                    <div class="activities__activity">
                        <h3>{{ $activity->name }}</h3>
                        <p>{{$activity->date_time}}</p>
                        <p>{{$activity->address}}</p>
                    </div>

                    <form action="{{ action('ActivityController@removeRegistration', 'Auth::user()->id', 'Auth::activity()->id' ) }}" method="post">
                        @csrf
                        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit">Remove Activity</button>
                    </form>

                @endforeach
            </div>
        </div>
    @endauth


    <!--  -->








<!--
Registered Activities
My activites
possibility to change my profile-->

@endsection


