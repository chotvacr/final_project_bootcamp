<!--Footer - Part
-   doesn't have to be customized
-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}" >

<div class="footer">

    <div class="content">
        @if (Route::current()->getName() == 'city.index')
        <p class="reference">Photo by ÉMILE SÉGUIN 🇨🇦 on Unsplash</p>
        @elseif (Route::current()->getName() == 'city.show')
        <p class="reference">Photo by Brooke Lark on Unsplash</p>
        @endif
    </div>
    

    <div class="links">
        @if(Route::current()->getName() == 'city.index')
        <div></div>
        @else 
        <a class="links--link" href="">Privacy</a>

        <a class="links--link" href="">Terms</a>

        <a class="links--link" href="">Company Details</a>

        <a class="links--link" href=""> Follow us on Twitter</a>
        @endif
    </div>
    


</div>