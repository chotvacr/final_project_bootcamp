@extends('layouts.layout')
@section('content')
{!! include ('css/app.css') !!}

    <h1 class="category">Category seleciton</h1>
    <br>
    <br>


    @foreach ($category as $category) 
        <h1>{{ $category->name }}</h1>
        <h2>{{ $category->description }}</h2>
        <a href="categories/{{ $category->id }}">Explore and find your activities</a>
        <br>
        <br>

    @endforeach

@endsection

