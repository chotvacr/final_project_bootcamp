<!--Footer - Part
-   doesn't have to be customized
-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}" >

<div class="footer">

    <div class="homepage--container__info">
        <h3>ProActive</h3>
        <p>Our Mission is to bring you together.</p>
    </div>
    <div class="homepage--container__contact">
        <h3>Contact</h3>
        <p>Prague / Nuremberg</p>
        <p>infor@examplemail.mail</p>
        <p>+ 0123456789</p>
    </div>
    <div class="content">
        @if (Route::current()->getName() == 'city.index')
        <p class="reference">Photo by ÉMILE SÉGUIN 🇨🇦 on Unsplash</p>
        @elseif (Route::current()->getName() == 'city.show')
        <p class="reference">Photos by Brooke Lark, Roman Kraft, Joshua Rawson-Harris, Safar Safarov and Brook Lark on Unsplash</p>
        @elseif (Route::current()->getName() == 'activity.detail')
        <p class="reference">Photo by Juuso Salminen on Unsplash</p>
        @endif
    </div>
    

    <div class="links">
        @if(Route::current()->getName() == 'city.index')
        
        @else 
        <a class="links--link" href="">Privacy</a>

        <a class="links--link" href="">Terms</a>

        <a class="links--link" href="">Company Details</a>

        <a class="links--link" href=""> Follow us on Twitter</a>
        @endif
    </div>
    


</div>