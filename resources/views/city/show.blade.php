<!--shows the Categories of one specific City-->

@extends('layouts.layout')
@section('content')
    
<h1>Welcome to {{ $city->name}}</h1>
<h2>Select your category</h2>

@foreach ($categories as $category)
    <div class="category">
        <h2> <a href="{{ route('activity.show', [$city->id, $category->id]) }}">{{ $category->name }}</a></h2>
        <h3>{{ $category->name }}</h3>
        <p>{{ $category->description }}</p>
        
        <form method="get" action="/cities/{{ $city->id }}/{{ $category->id }}/activities">
        <button type="submit">See all activities</button>
        </form>
        
    </div>
@endforeach

@endsection
