<link rel="stylesheet" type="text/css" href="{{ asset('css/profilepage.css') }}" >


@extends('layouts.layout')

@section('content')
    
    
    <div class="container">
        @guest
        <div class="personalinfo--guest"
            <div>
                <h2>Teacher Name: {{ $user->name }} {{ $user->surname }}</h2>
                <p> Teacher Contact: {{ $user->email }} </p>
                <p>{{ $user->description }}</p>
            </div>
        </div>
        @endguest
        @auth
            <div class="personalinfo">
                <div class="boxinfo">
                <h1 class="personalinfo__welcome">Welcome {{Auth::user()->name}}</h1>
    
                <div class="me">
                    <h2>Your Details: </h2>
                    
                    <p> Displayed description about me: {{Auth::user()->description}}</p>
                    
                    <form action="{{ route('profile.edit', [$user->id]) }}">
                        <div class="box"><div class="btn"><button class="submit" type="submit">Edit information about you</button></div></div>
                    </form>
                    <!-- <a href="{{ route('profile.edit', [$user->id]) }}">Edit information about you</a> -->
                </div>
            </div>
            </div>
    

            <div class="activities">
                <div class="activities__created">
                    <h2>My Created Activities</h2>
                    @if($activity === null)
                        <p>You haven't created any activities yet. Start your journey by clicking "Create Activitiy"</p>
                    @endif
    
                    @foreach ($activities as $activity)
                        
                        <div class="activities__activity">
                            <h3>{{ $activity->name }}</h3>
                            <p><b>Date and Time of Activity:</b><br> {{$activity->date_time}}</p>
                            <p><b>Location of Activity:</b><br>{{$activity->address}}</p>
                            <p><b>Description of Activity:</b><br>{{ $activity->description }}</p>
                            
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
    
                <!--Activities that a User has registered for -->
                <div class="activities__registered">
                    <h2>Activities I've registered for: </h2>
                    @if($register === null)
                        <p>You haven't registered for any activities yet. Start your journey by browsing your options.</p>
                    @endif
                    @foreach ($registered as $activity)
                        <div class="activities__activity">
                            <h3>{{ $activity->name }}</h3>
                            <p><b>Date and Time of Activity:</b><br>{{$activity->date_time}}</p>
                            <p><b>Location of Activity:</b><br>{{$activity->address}}</p>
                            <p><a href="/profile/{{ $activity->user_id }}">Visit</a> teachers profile</p>
                            <p>Contact Email: {{ $activity->email }}</p>
                        </div>
    
                        <form action="{{ action('ActivityController@removeRegistration', 'Auth::user()->id', 'Auth::activity()->id' ) }}" method="post">
                            @csrf
                            <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button type="submit">Remove Activity</button>
                        </form>
    
                    @endforeach
                </div>
        @endauth
    </div>

@endsection


