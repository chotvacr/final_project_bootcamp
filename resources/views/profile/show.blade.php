@extends('layouts.app')
@extends('partials.header')

 @section('content')

    @auth
        <h1>Welcome {{Auth::user()->name}}</h1>

        <div>
            <h1>Personal Details: </h1>
            <h2>{{Auth::user()->name}}</h2>
            <h2>{{Auth::user()->description}}</h2>
            <a href="{{ route('profile.edit', [$user->id]) }}">Edit this User</a>
        </div>
        
        <h1>These are my created activities: </h1>
        @foreach ($activities as $activity)
             <div class="activity">
                <h3>{{ $activity->name }}</h3>
                <p>{{ $activity->description }}</p>
            </div>
            <form action="{{ action('ActivityController@removeActivity', 'Auth::user()->id', 'Auth::activity()->id' ) }}" method="post">
                @csrf
                <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                <button type="submit">Remove Activity</button>
            </form>
        @endforeach

        <h1>These are my registered activities: </h1>
        @foreach ($registered as $activity)
            <h1>{{ $activity->name }}</h1>
            <form action="{{ action('ActivityController@removeRegistration', 'Auth::user()->id', 'Auth::activity()->id' ) }}" method="post">
                @csrf
                <input type="hidden" name="registered->activity_id" value="{{ register->activityid }}">
                <input type="hidden" name="registered->user_id" value="{{ register->userid }}">
                <button type="submit">I want no longer be part of this activity</button>
            </form>

        @endforeach

    @endauth


    <!--  -->








<!--
Registered Activities
My activites
possibility to change my profile-->

@endsection


