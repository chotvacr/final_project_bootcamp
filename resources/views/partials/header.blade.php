<!--Header - Part
-   has to be customized: 
    Landing Page: Login, Register, Personal Page, Log-Out
    Category-Page: Home, Login, Register, Personal Page, Log-out
    Activity-Page: Home, Categories, Login, Register, Personal Page, Log-out, Create Activity
-->

<img src="{{ asset('img/logo.png') }}" alt="blabla">

@guest
    <a href="">Login</a>   
    <a href="">Register</a>
    @if (Route::current()->getName() == 'city.show')
        <a href="">Home</a>
    @elseif(Route::current()->getName() == 'activity.show')
        <a href="">Home</a>
        <a href="">Categories</a>
    @elseif(Route::current()->getName() == 'activity.detail')
        <a href="">Home</a>
        <a href="">Categories</a>
        <a href="">Activities</a>
    @endif
@endguest

@auth
    <a href="">Personal Page</a>
    <a href="">Create Activity</a>
    <a href="">Logout</a>
    @if (Route::current()->getName() == 'city.show')
        <a href="">Home</a>
    @elseif(Route::current()->getName() == 'activity.show')
        <a href="">Home</a>
        <a href="">Categories</a>
    @elseif(Route::current()->getName() == 'activity.detail')
        <a href="">Home</a>
        <a href="">Categories</a>
        <a href="">Activities</a>
    @endif
@endauth