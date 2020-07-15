<!--shows the Landing page-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/homepage.css') }}" >

@extends('layouts.layout')
@section('content')

    <div class="homepage">
        
        <h1 class="homepage__headline">Ready for an adventure?</h1>
        <h2 class="homepage__secondHeadline">Meet your Neighborhood and start exploring!</h2>

        
        <h3 class="homepage__text">We are present in the following cities: </h3>

        <div class="homepage__links">
            @foreach ($cities as $city)
            <a class="homepage__link" href="/cities/{{ $city->id }}/categories">{{$city->name}}</a>
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

