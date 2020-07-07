@extends('layouts.layout')
@section('content')

    <h1>Category seleciton</h1>
    <br>
    <br>


    @foreach ($cities->categories as $category) 
        <h1>{{ $category->name }}</h1>
        <h2>{{ $category->description }}</h2>
        <a href="categories/{{ $category->id }}">Explore and find your activities</a>
        <br>
        <br>

    @endforeach

@endsection

