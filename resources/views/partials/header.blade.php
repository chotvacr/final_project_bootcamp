<!--Header - Part
-   has to be customized: 
    Landing Page: Login, Register, Personal Page, Log-Out
    Category-Page: Home, Login, Register, Personal Page, Log-out
    Activity-Page: Home, Categories, Login, Register, Personal Page, Log-out, Create Activity
-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}" >

<div class="header--container">

    
    <div class="container--links">
    <!--Links for Header depending on Authentication-->
        @guest
            <ul class="nav--item">
                <a class="nav--link" href="/login">Login</a>   
                <a class="nav--link" href="/register">Register</a>
            </ul>
            @if (Route::current()->getName() == 'city.index')
                <img src="{{ asset('img/logo.png') }}" alt="blabla" class="header--image">
            @endif
            @if (Route::current()->getName() == 'city.show')
                <ul class="nav--item">
                    <a class="nav--link" href="/">Home</a>
                </ul>    
            @elseif(Route::current()->getName() == 'activity.show')

    <!--Search-bar in Activity Overview Page-->
                <div class="search--container">
                    <form method="POST" action="{{ action('ActivityController@search') }}">
                        @csrf
                        <div class="search--input">
                            <input type="hidden" name="city_id" value="{{ $city->id }}">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="text" class="input--form" name="activity_input" placeholder="Search Activity">
                            <span class="input--form-btn">
                                <button type="submit" class="btn">Search</button>
                            </span>
                        </div>
                    </form>
                </div>

                <ul class="nav--item">
                    <a class="nav--link" href="/">Home</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                </ul>
            @elseif(Route::current()->getName() == 'activity.detail')
                <ul class="nav--item">
                    <a class="nav--link" href="/">Home</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/{{ $category->id }}/activities">Activities</a>
                </ul>
            @endif
        @endguest

        @auth
            <ul class="nav--item">
                <a class="nav--link" href="/logout">Logout</a>
                <a class="nav--link" href="/profile/{{ Auth::user()->id }}">Profile Page</a>
                <a class="nav--link" href="/activities/create">Create Activity</a>
            </ul>
            @if (Route::current()->getName() == 'city.index')
                <img src="{{ asset('img/logo.png') }}" alt="blabla" class="header--image">
            @endif
            @if (Route::current()->getName() == 'city.show')
                <ul class="nav--item">
                    <a class="nav--link" href="/">Home</a> 
                </ul>
            @elseif(Route::current()->getName() == 'activity.show')
                <ul class="nav--item">
                    <a class="nav--link" href="/">Home</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                </ul>
<!--Search-bar in Activity Overview Page-->
                <div class="search--container">
                    <form method="POST" action="{{ action('ActivityController@search') }}">
                        @csrf
                        <div class="search--input">
                            <input type="hidden" name="city_id" value="{{ $city->id }}">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="text" class="input--form" name="activity_input" placeholder="Search Activity">
                            <span class="input-form-btn">
                                <button type="submit" class="btn">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            @elseif(Route::current()->getName() == 'activity.detail')
                <ul class="nav--item">
                    <a class="nav--link" href="/">Home</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                    <a class="nav--link" href="/profile/{{ $user->id }}">Personal Page</a>
                </ul>
            @elseif(Route::current()->getName() == 'activity.create')
                <ul class="nav--item">
                    <a class="nav--link" href="/">Home</a>
                    <a class="nav--link" href="/cities/{{ $city->id }}/categories">Categories</a>
                </ul>
            @elseif(Route::current()->getName() == 'profile.show')
                <ul class="nav--item">
                    <a class="nav--link" href="/">Home</a>
                </ul>
            @endif
        @endauth
    </div>
    
</div>


