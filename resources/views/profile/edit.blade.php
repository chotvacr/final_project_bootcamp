@extends('layouts.app')
@extends('partials.header')

 @section('content')

    @auth
        <h1>Welcome {{Auth::user()->name}}</h1>

        <form method="post" action="/profile/{{Auth::user()->id }}">
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
        
    @endauth

<!--
Registered Activities
My activites
possibility to change my profile-->

@endsection


