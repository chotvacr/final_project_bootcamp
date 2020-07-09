<!--Header - Part
-   has to be customized: 
    Landing Page: Login, Register, Personal Page, Log-Out
    Category-Page: Home, Login, Register, Personal Page, Log-out
    Activity-Page: Home, Categories, Login, Register, Personal Page, Log-out, Create Activity
-->

<div class="header--container">

    <!--Logo for Header-->
    <img src="{{ asset('img/logo.png') }}" alt="blabla" class="header--image">

    <!--Links for Header depending on Authentication-->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>   
            <a class="nav-link" href="/register">Register</a>
        </li>
        @if (Route::current()->getName() == 'city.show')
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>    
        @elseif(Route::current()->getName() == 'activity.show')
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/cities/{{ $city->id }}/categories">Categories</a>
            </li>
        @elseif(Route::current()->getName() == 'activity.detail')
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/cities/{{ $city->id }}/categories">Categories</a>
                <a class="nav-link" href="/cities/{city_id}/{category_id}/activities">Activities</a>
            </li>
        @endif
    @endguest

    @auth
        <li class="nav-item">
            
            <a class="nav-link" href="/activities/create">Create Activity</a>
            <a class="nav-link" href="/logout">Logout</a>
        </li>
        @if (Route::current()->getName() == 'city.show')
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a> 
            </li>
        @elseif(Route::current()->getName() == 'activity.show')
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/cities/{{ $city->id }}/categories">Categories</a>
            </li>
        @elseif(Route::current()->getName() == 'activity.detail')
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/cities/{{ $city->id }}/categories">Categories</a>
                <a class="nav-link" href="/cities/{city_id}/{category_id}/activities">Activities</a>
                <a class="nav-link" href="/profile/{{ $user->id }}">Personal Page</a>
            </li>
        @endif
    @endauth
</div>


