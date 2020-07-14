<!--Header - Part
-   has to be customized: 
    Landing Page: Login, Register, Personal Page, Log-Out
    Category-Page: Home, Login, Register, Personal Page, Log-out
    Activity-Page: Home, Categories, Login, Register, Personal Page, Log-out, Create Activity
-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}" >

<div class="header--container">

    
    <div class="header">
        <!--Links for Header depending on Authentication-->
        @guest
        <ul class="header--nav">
                <a class="nav--link" href="/login">Login</a>   
                <a class="nav--link" href="/register">Register</a>
            @if (Route::current()->getName() == 'city.show')
                <a class="nav--link" href="/">Home</a>
            @elseif(Route::current()->getName() == 'activity.show')
                    <a class="nav--link" href="/">Home</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
            @elseif(Route::current()->getName() == 'activity.detail')
                
                    <a class="nav--link" href="/">Home</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/{{ $category->id }}/activities">Activities</a>
            @endif
        </ul>
        @endguest

        @if (Route::current()->getName() == 'city.index')
                <img class="header--image" src="{{ asset('img/logo.png') }}" alt="logo">
        @elseif (Route::current()->getName() == 'city.show')
        <a href="/">  <img class="header--image" src="{{ asset('img/logo.png') }}" alt="logo">  </a>
        @elseif (Route::current()->getName() == 'profile.show')
        <a href="/"> <img class="header--image" src="{{ asset('img/logo.png') }}" alt="logo">  </a>
        @elseif (Route::current()->getName() == 'activity.create')
        <a href="/">  <img class="header--image" src="{{ asset('img/logo.png') }}" alt="logo">  </a>
        @elseif (Route::current()->getName() == 'activity.edit')
        <a href="/">     <img class="header--image" src="{{ asset('img/logo.png') }}" alt="logo">  </a>
        @elseif (Route::current()->getName() == 'profile.edit')
        <a href="/">       <img class="header--image" src="{{ asset('img/logo.png') }}" alt="logo">  </a>
        @elseif (Route::current()->getName() == 'activity.show')
        <a href="/">        <img class="header--image" src="{{ asset('img/logo.png') }}" alt="logo"> </a>
        @elseif (Route::current()->getName() == 'activity.detail')
        <a href="/">        <img class="header--image" src="{{ asset('img/logo.png') }}" alt="logo"> </a>
        @endif

        @if(Route::current()->getName() == 'activity.show')
            <!--Search-bar in Activity Overview Page-->
            <div class="header--search">
                <form method="POST" action="{{ action('ActivityController@search') }}">
                    @csrf
                    <div class="header--search__input">
                        <input type="hidden" name="city_id" value="{{ $city->id }}">
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <input type="text" class="input--form" name="activity_input" placeholder="Search Activity">
                        <span class="input--form-btn">
                            <button type="submit" class="btn">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        @endif

        @auth
        <ul class="header--nav">
                <a class="nav--link" href="/logout">Logout</a>
                <a class="nav--link" href="/profile/{{ Auth::user()->id }}">My Profile</a>
                <a class="nav--link" href="/activities/create">Create Activity</a>
            
            

            @if (Route::current()->getName() == 'city.show')
                
                
                
            @elseif(Route::current()->getName() == 'activity.show')
                
                    
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                
                
            @elseif(Route::current()->getName() == 'activity.detail')
                
                   
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                     
                
            @elseif(Route::current()->getName() == 'activity.create')
                
                    
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                
            @elseif(Route::current()->getName() == 'profile.show')
                
                    
                    
                
            @endif
        </ul>
        @endauth

    </div>
    
</div>


