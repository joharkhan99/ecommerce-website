@extends('dashboard.layout.default')

@section('content')

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    <h4 style="background-color: rgba(43,44,64,.96)" class="p-4 my-2 mb-5 rounded">Products Bought so Far</h4>

    <div class="row">
      @foreach($data['products'] as $product)
      <div class="col-md-6 col-lg-4 my-2">
        <div class="card">
          <img class="card-img-top" style="height: 200px;" src="{{ Storage::url(explode(',',$product->picture)[0]) }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->productname }}</h5>
            <p class="card-text">
              {{ $product->productdescp }}
            </p>
          </div>
          <div class="card-body border-top d-flex justify-content-between align-items-center">
            <p>Price: ${{ $product->price }}</p>
            <a href="{{ url('product/'.$product->ProductID) }}" target="_blank" class="w-50 btn btn-primary d-block">Visit</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
  <!-- / Content -->

  <!-- Footer -->
  @include('dashboard.includes.footer')
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>

@stop