<!-- we call here React script -->
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity selection</title>
</head>
<body>
 
    <div id="app"></div>
 
    <script src="{{ mix('js/activities.js') }}"></script>
 
</body>
</html> -->

@extends('layouts.layout')
@section('content')

<h1>Activity detail </h1>

    @foreach ($activities as $activity)
        <div>
            <h2>{{ $activity->name }}</h2>
            <p>Group size: {{$activity->group_size}}</p>
            <p>Starts: {{$activity->date_time}}</p>
            <p>Where: {{$activity->adress}}</p>
            <p>Postcode: {{$activity->postcode}}</p>
            <p>Starts: {{$activity->date_time}}</p>
            <p>Rate per activity: {{$activity->price}}</p>
            <p>Contact: {{ $activity->email }}</p>
            <p>Course Description: {{ $activity->description }}</p>
        </div>
         <button href="activity/register">register for this activity</button>
      @endforeach
   
@endsection
