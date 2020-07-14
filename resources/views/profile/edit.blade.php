<link rel="stylesheet" type="text/css" href="{{ asset('css/profileedit.css') }}" >

@extends('layouts.app')
@extends('partials.header')

 @section('content')

    @auth
    <div class="edit">
        <h1>Welcome {{Auth::user()->name}}</h1>
        <p>Change your information here</p>

        <form class="edit__form" method="post" action="/profile/{{Auth::user()->id }}">
            @csrf
        
            <div>
                <label>Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>
        
            <div>
                <label>Description</label>
                <input type="text" name="description" value="{{ Auth::user()->description }}">
            </div>
        
            <button type="submit">Save me!</button>
        </form>
    </div>    
    @endauth

<!--
Registered Activities
My activites
possibility to change my profile-->

@endsection


