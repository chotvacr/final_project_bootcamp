@extends('layouts.layout')
@section('content')

  <h1>Landing Page</h1>

  <h2>Ready for an adventure?</h2>

  <select name="cities" id="cities">
    @foreach ($cities as $city)
    <option value="{{ $city->name }}" onclick="redirectTo()">{{ $city->name }}</option>
    @endforeach
  </select>

  <script>
    const redirectTo = () => {
      location.href = "/{{ $city->id }}/categories"
    }
  </script>

@endsection


