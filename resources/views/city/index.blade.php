<!--shows the Landing page-->

@extends('layouts.layout')
@section('content')

  <h1>Landing Page</h1>

  <h2>Ready for an adventure?</h2>

  <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
  <option value="">Select...</option>

  <!-- <select name="cities" id="cities"> -->
    @foreach ($cities as $city)
    <option value="/cities/{{ $city->id }}/categories"> {{$city->name}}</option>
    @endforeach
  </select>

<script>
    const redirectTo = () => {
      location.href = "/cities/{{ $city->id }}/categories"
      }
  </script>


  @guest 
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            
            @endif
            @else 
            <a href="{{ route('logout') }}">Log out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
            </form>
            @endguest

@endsection


