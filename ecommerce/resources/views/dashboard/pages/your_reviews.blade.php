@extends('dashboard.layout.default')

@section('content')

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    @if(Auth::user()->user_role=='customer')

    <h4 style="background-color: rgba(43,44,64,.96)" class="p-4 my-2 mb-5 rounded">Your Reviews on Products</h4>
    <div class="row">
      @foreach($data['reviews'] as $review)
      <div class="col-md-6 col-lg-6 my-2">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $review->productname }}</h5>
            <p>{{$review->review_text}}</p>
          </div>
          <div class="card-body border-top d-flex justify-content-between align-items-center py-1">
            <p class="m-0">
              @for ($i = 1; $i <= 5; $i++) @if($i<$review->review_rating)
                <i class='bx bxs-star' style="color: #ffc800;"></i>
                @else
                <i class='bx bx-star'></i>
                @endif
                @endfor
            </p>
            <a href="{{ url('review/'.$review->ProductID) }}" target="_blank" class="w-50 btn btn-primary d-block">Visit</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    @else
    <h4 style="background-color: rgba(43,44,64,.96)" class="p-4 my-2 mb-5 rounded">Customer Feedback on Your Products</h4>
    <div class="row">
      @foreach($data['reviews'] as $review)
      <div class="col-md-6 col-lg-6 my-2">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $review->productname }}</h5>
            <p>{{$review->review_text}}</p>
          </div>
          <div class="card-body border-top d-flex justify-content-between align-items-center py-1">
            <p class="m-0">
              @for ($i = 1; $i <= 5; $i++) @if($i<$review->review_rating)
                <i class='bx bxs-star' style="color: #ffc800;"></i>
                @else
                <i class='bx bx-star'></i>
                @endif
                @endfor
            </p>
            <a href="{{ url('review/'.$review->ProductID) }}" target="_blank" class="w-50 btn btn-primary d-block">Visit</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif

  </div>
  <!-- / Content -->

  <!-- Footer -->
  @include('dashboard.includes.footer')
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>

@stop