<div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 110px;">
  <header class="default-header">
    <div class="menutop-wrap">
      <div class="menu-top container">
        <div class="d-flex justify-content-between align-items-center">
          <ul class="list">
            <li><a href="tel:+12312-3-1209">+12312-3-1209</a></li>
            <li><a href="mailto:support@colorlib.com">support@closet.com</a></li>
          </ul>
          <ul class="list navbar-nav flex-row">
            @if(Auth::check())
            <li><a href="{{url('dashboard')}}"><i class="fa-solid fa-user"></i></a></li>
            @else
            <li><a href="{{url('registration')}}">login</a></li>
            @endif

            <li>
              <a href="{{ url('cart') }}">
                <i class="fa-solid fa-cart-shopping"></i>
              </a>
            </li>


          </ul>
        </div>
      </div>
    </div>

    @include('frontend.includes.nav')

  </header>
</div>