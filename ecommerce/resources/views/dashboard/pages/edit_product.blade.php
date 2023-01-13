@extends('dashboard.layout.default')

@section('content')

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    <form action="{{ route('update_product') }}" method="POST" enctype="multipart/form-data">
      @if (session('productsuccess'))
      <div class="card-body">
        <div class="alert alert-success" role="alert" style="background: #0ddd6aed;color: #ffffff;text-align: center;">
          {{ session('productsuccess') }}
        </div>
      </div>
      @endif
      @csrf

      <div class="row">
        <div class="col-md-6 order-0 mb-4">
          <div class="card h-100 w-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
              <div class="card-title mb-4">
                <h5 class="m-0 me-2">Product Name & Description</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="productname">Name/Title</label>
                <input type="text" class="form-control" name="productname" value="{{$data['product']->productname}}" placeholder="black leather" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="productdescp">Description</label>
                <textarea name="productdescp" cols="30" rows="4" class="form-control" required>{{$data['product']->productdescp}}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 order-0 mb-4">
          <div class="card h-100 w-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
              <div class="card-title mb-4">
                <h5 class="m-0 me-2">Product Details</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="gender">Gender</label>
                <select name="gender" class="form-control" id="" required>
                  <option value="{{$data['product']->gender}}" selected>{{$data['product']->gender}}</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="unisex">Unisex</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="e.g. 3" value="{{$data['product']->quantity}}" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="category">Category</label>
                <select name="category" class="form-control" id="" required>
                  <option value="{{$data['curr_cat']->CategoryID}}" selected>{{$data['curr_cat']->name}}</option>
                  @foreach($data['categories'] as $cat)
                  <option value="{{ $cat->CategoryID }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 order-0 mb-4">
          <div class="card h-100 w-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
              <div class="card-title mb-4">
                <h5 class="m-0 me-2">Product Pricing & Discount</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="price">Price ($)</label>
                <input type="text" class="form-control" name="price" value="{{$data['product']->price}}" placeholder="e.g. 100" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="discount">Discount (%)</label>
                <input type="text" class="form-control" name="discount" value="{{$data['product']->discount}}" placeholder="e.g. 10" required>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 order-0 mb-4">
          <div class="card h-100 w-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
              <div class="card-title mb-4">
                <h5 class="m-0 me-2">Product Media</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="mb-0">
                <label class="form-label" for="images">Upload Product Images</label>
                <input type="file" class="form-control" id="images" name="images[]" placeholder="e.g. 100" multiple onchange="previewImages('clear')">
                <div style="border: 1px dotted #646589;border-radius: 5px;" class="mt-3 p-2" id="product_images">
                  @foreach(explode(',',$data['product']->picture) as $img)
                  <img src="{{ Storage::url($img) }}" width="60" height="60" style="object-fit: cover; margin-right: 4px;">
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="prod_id" value="{{$data['product']->ProductID }}">
      <button type="submit" class="btn btn-primary d-block w-50 mx-auto mt-3">Update Product</button>

    </form>

  </div>
  <!-- / Content -->

  <!-- Footer -->
  @include('dashboard.includes.footer')
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>

@stop