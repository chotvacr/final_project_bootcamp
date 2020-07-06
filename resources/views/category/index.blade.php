@extends('layouts.layout')
@section('content')

    <h1>Blasdfkljasdlfkj</h1>
    <br>
    <br>


    @foreach ($categories as $category) 
        <h1>{{ $category->name }}</h1>
        <h2>{{ $category->description }}</h2>
        <a href="categories/{{ $category->id }}">Explore...</a>
        <br>
        <br>

    @endforeach

@endsection

