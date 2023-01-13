@extends('dashboard.layout.default')

@section('content')

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    <form action="{{ route('create_product') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="productname" placeholder="black leather" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="productdescp">Description</label>
                <textarea name="productdescp" cols="30" rows="4" class="form-control" required></textarea>
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
                  <option value="" selected>select an option</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="unisex">Unisex</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="e.g. 3" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="category">Category</label>
                <select name="category" class="form-control" id="" required>
                  <option value="" selected>select an option</option>
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
                <input type="text" class="form-control" name="price" placeholder="e.g. 100" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="discount">Discount (%)</label>
                <input type="text" class="form-control" name="discount" placeholder="e.g. 10" required>
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
                <input type="file" class="form-control" id="images" name="images[]" placeholder="e.g. 100" required multiple onchange="previewImages()">
                <div style="border: 1px dotted #646589;border-radius: 5px;" class="mt-3 p-2" id="product_images">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary d-block w-50 mx-auto mt-3">Add Product</button>

    </form>

  </div>
  <!-- / Content -->

  <!-- Footer -->
  @include('dashboard.includes.footer')
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>

@stop