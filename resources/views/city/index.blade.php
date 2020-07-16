<!--shows the Landing page-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/homepage.css') }}" >

@extends('layouts.layout')
    @section('content')

        <div class="homepage">
            
            <h1 class="homepage--headline">Ready for an adventure?</h1>

            <h3 class="homepage--text">Meet your neighbours and start exploring! </h3>

    
            <div class="homepage--nav">
                <button class="homepage--nav__button">Cities</button>
                <div class="homepage--nav__content">
                    @foreach ($cities as $city)
                    <a class="content" href="/cities/{{ $city->id }}/categories">{{$city->name}}</a>
                    @endforeach
                </div>
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

