<!--shows the Categories of one specific City-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}" >

@extends('layouts.layout')
@section('content')

<!--@if ($city->name == 'Prague')
    class="prague"
    @elseif ($city->name == 'Nuremberg')
    class="nuremberg"
    @endif>-->

<div class="city">

    <div class="city--head"><h1>Welcome to {{ $city->name}}</h1></div>
    <div class="city--subhead"><h2>What would you like to do?</h2></div>

    <div class="city--category">
        @foreach ($categories as $category)
        <h2 class="city--category__name"> <a class="city--category__link" href="{{ route('activity.show', [$city->id, $category->id]) }}">{{ $category->name }}</a></h2>
            
            <p class="city--category__item">{{ $category->description }}</p>
        @endforeach
    </div>
  
</div>

@endsection
