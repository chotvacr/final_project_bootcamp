<!--shows the Categories of one specific City-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}" >

@extends('layouts.layout')
@section('content')

<div class="city">

    <div class="city--head"><h1>Welcome to {{ $city->name}}</h1></div>
    <div class="city--subhead"><h2>What would you like to do?</h2></div>

    <div class="city--category">
        @foreach ($categories as $category)
        <div @if($category->name== 'Helping')
            class="city--category__helping"
            @elseif($category->name== 'Language Classes')
            class="city--category__language"
            @elseif($category->name== 'Coding')
            class="city--category__coding"
            @elseif($category->name== 'Cooking Classes')
            class="city--category__cooking"
            @endif>
                <a class="city--category__link" href="{{ route('activity.show', [$city->id, $category->id]) }}">{{ $category->name }}</a>
                <p class="city--category__item">{{ $category->description }}</p>
        </div>
        
        
        @endforeach
        
        
    </div>
  
</div>

@endsection
