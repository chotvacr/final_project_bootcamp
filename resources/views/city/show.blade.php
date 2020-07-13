<!--shows the Categories of one specific City-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/city.show.css') }}" >

@extends('layouts.layout')
@section('content')

<!--@if ($city->name == 'Prague')
    class="prague"
    @elseif ($city->name == 'Nuremberg')
    class="nuremberg"
    @endif>-->

<div class="city--container"

    <div class="head--one"><h1>Welcome to {{ $city->name}}</h1></div>
    <div class="head--two"><h2>What would you like to do?</h2></div>

    <div class="category">
        @foreach ($categories as $category)
        <h2 class="category--item-name"> <a class="category--link" href="{{ route('activity.show', [$city->id, $category->id]) }}">{{ $category->name }}</a></h2>
            <h3 class="category--item">{{ $category->name }}</h3>
            <p class="category--item">{{ $category->description }}</p>
        @endforeach
    </div>
  
</div>

@endsection
