<!--creates new Activity-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/create.css') }}" >

@extends('layouts.layout')
@section('content')
    <div class="create">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="create--form">
            <form method="post" action="{{ action('ActivityController@store') }}">
                @csrf
                <div class="container"></div>
                    <div class="form">
                        <div>
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    </div>
                
                    <div> Select the city <br>
                        <select name="city_id" id="cities" >
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div> Category <br>
                        <select name="category_id" id="categories" >
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="elm">
                        <div><label>Name of the Activity</label></div>
                        <div><input class="input" type="text" name="name" placeholder="required"></div>
                    </div>
                    <br>
                    <div class="elm">
                        <label>Description</label><br>
                        <input class="description" type="text" name="description" placeholder="min 30 characters">
                    </div>
                    <br>
                    <div class="elm">
                        <label>Group Size</label><br>
                        <input class="input" type="text" name="group_size" placeholder="min-size 1">
                    </div>
                    <br>
                    <div class="elm">
                        <label>Price per Hour</label><br>
                        <input class="input" type="text" name="price" placeholder="required">
                    </div>
                    <br>
                    <div class="elm">
                        <label>Date and Time of Activity</label><br>
                        <input class="input" type="datetime-local" name="date_time" value="YYYY-MM-DDTHH:MM">
                    </div>
                    <br>
                    <div class="elm">
                        <label>Address of activity</label><br>
                        <input class="input" type="text" name="address" placeholder="Street, Number">
                    </div>
                    <br>
                    <div class="elm">
                        <label>Postcode</label><br>
                        <input class="input" type="text" name="postcode" placeholder="required">
                    </div>
                    <br>
                    <div class="elm">
                        <label>Contact email</label><br>
                        <input class="input" type="text" name="email" value="{{ Auth::user()->email }}">
                    </div>
                
                    <div class="box"><div class="btn"><button class="submit" type="submit">Save my new activity</button></div></div>
                
            </form>
        </div>
    </div>
    
@endsection

