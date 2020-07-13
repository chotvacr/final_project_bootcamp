<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.show.css') }}" >


@extends('layouts.app')
@extends('partials.header')

 @section('content')

    @auth
        <h1>Welcome {{Auth::user()->name}}</h1>

        <div>
            <h1>Personal Details: </h1>
            
            <h2>{{Auth::user()->description}}</h2>
            <a href="{{ route('profile.edit', [$user->id]) }}">Edit this User</a>
        </div>
        

        <div class="activities">
            <div>
                <h1>My created activities </h1>
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
                    <form action="{{ action('ActivityController@edit', 'Auth::()->id', 'Auth::activity()->id' ) }}" method="get">
                        @csrf
                        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                        <button type="submit">Edit Activity</button>
                    </form>
                @endforeach
            </div>

            <div>
                <h1>My registered activities </h1>
                @foreach ($registered as $activity)
                    <h1>{{ $activity->name }}</h1>
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


