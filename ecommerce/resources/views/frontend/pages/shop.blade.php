@extends('frontend.layout.default')

@section('content')

<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
      <div class="col-first">
        <h1>Shop Category page</h1>
        <nav class="d-flex align-items-center justify-content-start">
          <a href="index.html">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
          <a href="category.html">Fashon Category</a>
        </nav>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row">
    <div class="col-xl-9 col-lg-8 col-md-7">

      <div class="filter-bar d-flex flex-wrap align-items-center">
        <div class="sorting">
          <form action="{{ route('sort_by_date') }}" method="POST">
            @csrf

            <select style="display: none;" name="filter" onchange="this.form.submit()">
              <option value="date_desc">Sort By Date Descending</option>
              <option value="date_asc">Sort By Date Ascending</option>
              <option value="price_desc">Sort By Price Descending</option>
              <option value="price_asc">Sort By Price Ascending</option>
            </select>

          </form>
        </div>

        <div class="sorting mr-auto">
          <select style="display: none;">
            <option value="1">Show 10</option>
            <option value="1">Show 14</option>
            <option value="1">Show 20</option>
          </select>
          <div class="nice-select" tabindex="0">
            <span class="current">Show 10</span>
            <ul class="list">
              <li class="option selected focus">Show 14</li>
              <li class="option">Show 20</li>
            </ul>
          </div>
        </div>
      </div>


      <section class="lattest-product-area pb-40 category-list">
        <div class="row">
          @foreach($data['products'] as $product)
          <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
            <div class="content">
              <div class="content-overlay"></div>
              <img src="{{ Storage::url(explode(',',$product->picture)[0]) }}" width="80" alt="" class="content-image img-fluid d-block mx-auto">
              <div class="content-details fadeIn-bottom">
                <div class="bottom d-flex align-items-center justify-content-center" style="background-image: none;">
                  <a href="{{ url('product/'.$product->ProductID) }}" style="background-image: -webkit-linear-gradient(45deg, #f6463d 0%, #f6398d 45%, #f52cdc 100%);" class="text-white w-100">View More</a>
                </div>
              </div>
            </div>
            <div class="price">
              <h5>{{$product->productname}}</h5>
              <h3>${{$product->price}}</h3>
            </div>
          </div>
          @endforeach
        </div>
      </section>

      <div class="filter-bar d-flex flex-wrap align-items-center justify-content-center">
        <div class="pagination border-0">
          {{$data['products']->links()}}
        </div>
      </div>

    </div>

    <div class="col-xl-3 col-lg-4 col-md-5">
      <div class="sidebar-categories">
        <div class="head">Browse Categories</div>
        <ul class="main-categories">
          @foreach($data['categories'] as $cat)
          <li class="main-nav-list">
            <a href="{{ url('filter_category/'.$cat->CategoryID) }}">{{ $cat->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="sidebar-filter mt-50">
        <div class="top-filter-head">Product Filters</div>
        <div class="common-filter">
          <div class="head">Active Filters</div>
          <ul>
            <li class="filter-list"><i class="fa fa-window-close" aria-hidden="true"></i>Gionee (29)</li>
            <li class="filter-list"><i class="fa fa-window-close" aria-hidden="true"></i>Black with red (09)</li>
          </ul>
        </div>
        <div class="common-filter">
          <div class="head">Gender</div>
          <form action="{{ route('filter_gender') }}" method="POST">
            @csrf
            <ul>
              <li class="filter-list">
                <input class="pixel-radio" type="radio" id="male-filter" onchange="this.form.submit()" name="gender" value="male"><label for="male-filter">Male</label>
              </li>
              <li class="filter-list">
                <input class="pixel-radio" type="radio" id="female-filter" onchange="this.form.submit()" name="gender" value="female"><label for="female-filter">Female</label>
              </li>
              <li class="filter-list">
                <input class="pixel-radio" type="radio" id="unisex-filter" onchange="this.form.submit()" name="gender" value="unisex"><label for="unisex-filter">Unisex</label>
              </li>
              <li class="filter-list">
                <input class="pixel-radio" type="radio" id="other-filter" onchange="this.form.submit()" name="gender" value="others"><label for="other-filter">Others</label>
              </li>
            </ul>
          </form>
        </div>
        <div class="common-filter">
          <div class="head">Price Range</div>
          <div class="price-range-area pt-0">
            <form action="{{ route('filter_price') }}" method="POST">
              @csrf
              <div class="value-wrapper mt-2">
                <div class="row">
                  <div class="col pe-0">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend d-flex">
                        <span class=" font-12 input-group-text fw-bold d-inline rounded-start rounded-0 border-end-0 bg-transparent" id="basic-addon1">$</span>
                      </div>
                      <input type="text" class="form-control shadow-none font-12" placeholder="Min" aria-label="Min" aria-describedby="basic-addon1" name="min" required>
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend d-flex">
                        <span class=" font-12 input-group-text fw-bold d-inline rounded-start rounded-0 border-end-0 bg-transparent" id="basic-addon1">$</span>
                      </div>
                      <input type="text" class="form-control shadow-none font-12" placeholder="Max" aria-label="Max" aria-describedby="basic-addon1" name="mix" required>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn text-white w-100 d-block shadow-none font-12" style="background-image: -webkit-linear-gradient(45deg, #f6463d 0%, #f6398d 45%, #f52cdc 100%);">Apply Price</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@stop