@extends('frontend.layout.default')

@section('content')

<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
      <div class="col-first">
        <h1>Single Product Page</h1>
        <nav class="d-flex align-items-center justify-content-start">
          <a href="index.html">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
          <a href="single.html">Single Product Page</a>
        </nav>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="product-quick-view">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="quick-view-carousel-details owl-carousel owl-theme owl-loaded">
          <div class="owl-stage-outer">

            <div class="owl-stage" style="transform: translate3d(-1080px, 0px, 0px); transition: all 0.5s ease 0s; width: 3780px;">

              @foreach(explode(',',$data['product']->picture) as $img)
              <!-- {{ Storage::url($img) }} -->
              <div class="owl-item active" style="width: 540px; margin-right: 0px;">
                <div class="item" style="background: url('<?php echo str_replace('public/', "/storage/", $img) ?>');">
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="owl-controls">
            <div class="owl-nav">
              <div class="owl-prev" style="display: none;">prev</div>
              <div class="owl-next" style="display: none;">next</div>
            </div>
            <div class="owl-dots">
              <div class="owl-dot active"><span></span></div>
              <div class="owl-dot"><span></span></div>
              <div class="owl-dot"><span></span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="quick-view-content">
          <div class="top">
            <h3 class="head">{{$data['product']->productname}}</h3>
            <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">${{$data['product']->price}}</span></div>
            <div class="category">Category: <span>{{$data['curr_cat']->name}}</span></div>
            <div class="available">Availibility: <span>{{$data['product']->productavailable=='yes'?'In Stock':'Out of Stock'}}</span></div>
          </div>
          <div class="middle">
            <p class="content">
              {{$data['product']->productdescp}}
            </p>
          </div>
          <div>
            <form action="{{ route('add_to_cart') }}" method="POST">
              @csrf
              <div class="quantity-container d-flex align-items-center mt-15">
                Quantity:
                <input type="number" style="width: 100px;outline: none;" name="quantity" class="quantity-amount ml-15" value="1" min=1 max={{$data['product']->quantity}} required>
                <div class="arrow-btn d-inline-flex flex-column">
                  <button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
                  <button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                </div>
              </div>
              <div class="d-flex mt-20">
                <input type="hidden" name="productid" value="{{$data['product']->ProductID}}">
                <button class="view-btn color-2"><span>Add to Cart</span></button>
                <a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <div class="row">
    <div class="col-md-12">
      <div class="details-tab-navigation d-flex justify-content-center mt-30">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li>
            <a class="nav-link active">Vendor Details</a>
          </li>
        </ul>
      </div>


      <div class="card mb-3 p-3" style="border: 1px solid #eee;">
        <div class="row g-0 align-items-center">
          <div class="col-md-4 text-center">
            <img src="{{Storage::url($data['supplier']->logo)}}" class="rounded-circle" alt="" style="width: 100px;height: 100px;object-fit: cover;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$data['supplier']->companyname}}</h5>
              <p class="card-text m-0">Owner <b>{{$data['supplier']->fname}} {{$data['supplier']->lname}}</b></p>
              <p class="card-text m-0">Email <b>{{$data['supplier']->email}}</b></p>
              <p class="card-text m-0">Address <b>{{$data['supplier']->address}}, {{$data['supplier']->city}}, {{$data['supplier']->country}}</b></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="details-tab-navigation d-flex justify-content-center mt-30">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li>
        <a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews</a>
      </li>
    </ul>
  </div>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews">
      <div class="review-wrapper">
        <div class="row">
          <div class="col-lg-6">
            <div class="review-stat d-flex align-items-center flex-wrap">
              <div class="review-overall">
                <h3>Overall</h3>
                <div class="main-review">
                  <?php $sum = 0; ?>
                  @foreach($data['reviews'] as $review)
                  <?php $sum += $review->review_rating ?>
                  @endforeach
                  {{ number_format($sum / count($data['reviews']),1) }}
                </div>
                <span>({{count($data['reviews'])}} Reviews)</span>
              </div>
              <div class="review-count">
                <h4>Based on 3 Reviews</h4>
                <div class="single-review-count d-flex align-items-center">
                  <span>5 Star</span>
                  <div class="total-star five-star d-flex align-items-center">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <span>01</span>
                </div>
                <div class="single-review-count d-flex align-items-center">
                  <span>4 Star</span>
                  <div class="total-star four-star d-flex align-items-center">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <span>01</span>
                </div>
                <div class="single-review-count d-flex align-items-center">
                  <span>3 Star</span>
                  <div class="total-star three-star d-flex align-items-center">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <span>01</span>
                </div>
                <div class="single-review-count d-flex align-items-center">
                  <span>2 Star</span>
                  <div class="total-star two-star d-flex align-items-center">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <span>00</span>
                </div>
                <div class="single-review-count d-flex align-items-center">
                  <span>1 Star</span>
                  <div class="total-star one-star d-flex align-items-center">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <span>00</span>
                </div>
              </div>
            </div>
            <div class="total-comment">

              @foreach($data['reviews'] as $review)

              <div class="single-comment">
                <div class="user-details d-flex align-items-center">
                  <img src="{{ Storage::url($review->picture) }}" class="img-fluid" alt="" style="object-fit: cover;">
                  <div class="user-name">
                    <h5>{{$review->fname}} {{$review->lname}}</h5>
                    <div class="total-star five-star d-flex align-items-center">
                      Rating: {{$review->review_rating}}
                    </div>
                  </div>
                </div>
                <p class="user-comment">
                  {{$review->review_text}}
                </p>
              </div>

              @endforeach

            </div>
          </div>
          <div class="col-lg-6">
            <div class="add-review">
              <h3>Add a Review</h3>
              @if (Auth::check() && Auth::user()->user_role == 'customer')
              <form class="main-form" action="{{ route('add_review') }}" method="POST">
                @csrf
                <input type="text" placeholder="Rating between 1 and 5" onfocus="this.placeholder=''" onblur="this.placeholder = 'Rating between 1 and 5'" required="" class="common-input" name="rating">
                <textarea placeholder="Review" onfocus="this.placeholder=''" onblur="this.placeholder = 'Review'" required="" class="common-textarea" name="review_text"></textarea>
                <input type="hidden" name="productid" value="{{$data['product']->ProductID}}">
                <button class="view-btn color-2" type="submit"><span>Submit Now</span></button>
              </form>
              @else
              <div class="text-center">
                <a href="{{ url('registration') }}" class="">Please Login or Create an Account</a>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="pt-100 pb-100">
  <div class="container">
    <div class="organic-section-title text-center">
      <h3>Most Searched Products</h3>
    </div>
    <div class="row mt-30">
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r1.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Blueberry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r2.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Cabbage</a>
            <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r3.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Raspberry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r4.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Kiwi</a>
            <div class="price"><span class="lnr lnr-tag"></span> $189.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r5.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore Bell Pepper</a>
            <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r6.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Blackberry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r7.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Brocoli</a>
            <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r8.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Carrot</a>
            <div class="price"><span class="lnr lnr-tag"></span> $120.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r9.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Strawberry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r10.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Prixma MG2 Light Inkjet</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r11.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Cherry</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="single-search-product d-flex">
          <a href="02-11-product-details.html"><img src="img/r12.jpg" alt=""></a>
          <div class="desc">
            <a href="02-11-product-details.html" class="title">Pixelstore fresh Beans</a>
            <div class="price"><span class="lnr lnr-tag"></span> $240.00 <del>$340.00</del></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@stop