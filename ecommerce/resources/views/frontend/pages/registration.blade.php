@extends('frontend.layout.default')

@section('content')

<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
      <div class="col-first">
        <h1>Shopping Cart</h1>
        <nav class="d-flex align-items-center justify-content-start">
          <a href="index.html">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
          <a href="cart.html">Shopping Cart</a>
        </nav>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="login-form">
        <h3 class="billing-title text-center">Login</h3>
        <p class="text-center mt-80 mb-40">Welcome back! Sign in to your account </p>
        <form action="{{ route('login.post') }}" method="POST">
          @if (session('loginsuccess'))
          <div class="card-body">
            <div class="alert alert-success" role="alert" style="background: #0ddd6aed;color: #ffffff;text-align: center;">
              {{ session('loginsuccess') }}
            </div>
          </div>
          @endif
          @if (session('loginerror'))
          <div class="card-body">
            <div class="alert alert-success" role="alert" style="background: #f63c7a;color: #ffffff;text-align: center;">
              {{ session('loginerror') }}
            </div>
          </div>
          @endif
          @csrf
          <input type="email" name="email" placeholder="Email address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email address*'" required="" class="common-input mt-20">
          <input type="password" name="password" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required="" class="common-input mt-20">
          <button class="view-btn color-2 mt-20 w-100"><span>Login</span></button>
          <div class="mt-20 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center"><input type="checkbox" class="pixel-checkbox" id="login-1"><label for="login-1">Remember me</label></div>
            <a href="#">Lost your password?</a>
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-6">

      <div class="register-form">
        <h3 class="billing-title text-center">Register</h3>
        <p class="text-center mt-40 mb-30">Create your very own account </p>
        <form action="{{ route('register.post') }}" method="POST">
          @if (session('success'))
          <div class="card-body">
            <div class="alert alert-success" role="alert" style="background: #0ddd6aed;color: #ffffff;text-align: center;">
              {{ session('success') }}
            </div>
          </div>
          @endif
          @csrf
          <input type="text" name="name" placeholder="Full name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Full name*'" required="" class="common-input mt-20">
          <input type="email" name="email" placeholder="Email address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email address*'" required="" class="common-input mt-20">
          <input type="password" name="password" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required="" class="common-input mt-20">
          <button class="view-btn color-2 mt-20 w-100"><span>Register</span></button>
        </form>
      </div>

    </div>
  </div>
</div>

<section class="section-half">
  <div class="container">
    <div class="organic-section-title text-center">
      <h3>Most Searched Products</h3>
    </div>
    <div class="row mt-30">
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r1.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Blueberry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r2.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Cabbage</a>
            <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r3.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Raspberry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r4.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Kiwi</a>
            <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r5.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore Bell Pepper</a>
            <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r6.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Blackberry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r7.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Brocoli</a>
            <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r8.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Carrot</a>
            <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r9.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Strawberry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r10.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Prixma MG2 Light Inkjet</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r11.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Cherry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="#"><img src="img/r12.jpg" alt=""></a>
          <div class="desc">
            <a href="#" class="title">Pixelstore fresh Beans</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@stop