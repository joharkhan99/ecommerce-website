@extends('frontend.layout.default')

@section('content')

<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
      <div class="col-first">
        <h1>Cart</h1>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="cart-title">
    <div class="row">
      <div class="col-md-6">
        <h6 class="ml-15">Product</h6>
      </div>
      <div class="col-md-2">
        <h6>Price</h6>
      </div>
      <div class="col-md-2">
        <h6>Quantity</h6>
      </div>
      <div class="col-md-2">
        <h6>Total</h6>
      </div>
    </div>
  </div>
  @foreach($data['products'] as $product)

  <div class="cart-single-item">
    <div class="row align-items-center">
      <div class="col-md-6 col-12">
        <div class="product-item d-flex align-items-center">
          <img src="{{ Storage::url(explode(',',$product->picture)[0]) }}" class="img-fluid w-25" alt="">
          <h6>{{$product->productname}}</h6>
        </div>
      </div>
      <div class="col-md-2 col-6">
        <div class="price">${{$product->price}}</div>
      </div>
      <div class="col-md-2 col-6 text-dark fw-bold">
        {{$product->quantity}}
      </div>
      <div class="col-md-2 col-12">
        <div class="total">${{$product->price * $product->quantity}}</div>
      </div>
    </div>
  </div>

  @endforeach

  <div class="subtotal-area d-flex align-items-center justify-content-end">
    <div class="title text-uppercase">Subtotal</div>

    <?php $sum = 0; ?>
    @foreach($data['products'] as $product)
    <?php $sum += ($product->price * $product->quantity) ?>
    @endforeach

    <div class="subtotal">${{$sum}}</div>
  </div>
  <div class="shipping-area d-flex justify-content-end">
    <a href="" class="view-btn color-2 mt-10"><span>Check Out</span></a>
  </div>
</div>


@stop