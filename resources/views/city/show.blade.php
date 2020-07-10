<!--shows the Categories of one specific City-->

@extends('layouts.layout')
@section('content')
    
<h1>Welcome to {{ $city->name}}</h1>
<h2>Select your category</h2>

@foreach ($categories as $category)
    <div class="category">
        <h3>{{ $category->name }}</h3>
        <p>{{ $category->description }}</p>
        <button class="button" type="button" onclick="window.location='{{ route('activity.show', [$city->id, $category->id]) }}'">Join {{ $category->name }}!</button>
    </div>
@endforeach

@endsection
