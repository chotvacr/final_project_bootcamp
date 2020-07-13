<!--shows the Landing page-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/homepage.css') }}" >

@extends('layouts.layout')
@section('content')

    <div class="homepage--container">
        
        <h1 class="home--headline">Ready for an adventure?</h1>
        <h2 class="home--secondHeadline">Meet your Neighborhood and start exploring!</h2>

        <div class="home--nav">
            <h3>We are present in cities </h3>
            @foreach ($cities as $city)
            <a href="/cities/{{ $city->id }}/categories">{{$city->name}}</a>
            @endforeach
        </div>

        
        
    </div>

@endsection 

<!--
This is an option for the selection: 
<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            <option value="">Select...</option>
        
                @foreach ($cities as $city)
                <option value="/cities/{{ $city->id }}/categories"> {{$city->name}}</option>
                @endforeach
        </select>




-->

