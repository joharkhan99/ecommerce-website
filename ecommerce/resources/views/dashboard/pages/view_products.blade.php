@extends('dashboard.layout.default')

@section('content')

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">View your Products</h4>
    <div class="card py-4">

      <div class="alert alert-success m-3 mb-5" role="alert" style="background: #0ddd6aed;color: #ffffff;text-align: center;display: none;">
      </div>


      <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr class="text-center">
              <th>s.No</th>
              <th>Name/Title</th>
              <th>Description</th>
              <th>Category</th>
              <th>Gender</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Media</th>
              <th>Enable/Disable</th>
              <th>Created at</th>
              <th>updated at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php $i = 1; ?>
            @foreach($data['products'] as $product)
            <tr class="text-center">
              <td>{{ $i }}</td>
              <td><strong>{{ $product->productname }}</strong></td>
              <td>{{ substr($product->productdescp,0,20) }}...</td>
              <td>{{ DB::table('category')->where('CategoryID' ,'=', $product->categoryid)->first()->name }}</td>
              <td>{{ $product->gender }}</td>
              <td>{{ $product->quantity }}</td>
              <td><span class="badge bg-label-success me-1">${{ $product->price }}</span></td>
              <td><span class="badge bg-label-warning me-1">{{ $product->discount }}%</span></td>
              <td>
                @foreach(explode(',',$product->picture) as $img)
                <img src="{{ Storage::url($img) }}" width="80" alt="">
                @endforeach
              </td>
              <td class="text-center">
                <form>
                  @csrf
                  <input type="hidden" value="{{ $product->ProductID }}" name="product_id">
                  <label class="switch" @if($product->productavailable=='yes' ) title="Enabled" @else ttile="Disabled" @endif>
                    <input type="checkbox" name="availability" data-prod_id="{{ $product->ProductID }}" value="{{$product->productavailable}}" @if($product->productavailable=='yes' ) checked @endif onchange="CHangeProdVIsibility(this)" />
                    <span class="slider round"></span>
                  </label>
                </form>
              </td>
              <td><span class="badge bg-label-primary me-1">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans() }}</span></td>
              <td><span class="badge bg-label-info me-1">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($product->updated_at))->diffForHumans() }}</span></td>
              <td class="text-center">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="edit_product/{{$product->ProductID }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="delete_product/{{$product->ProductID }}" onclick="return confirm('Are you sure you want to delete this product?');"><i class="bx bx-trash me-1"></i> Delete</a>
                  </div>
                </div>
              </td>
            </tr>

            <?php $i++; ?>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- / Content -->

  <!-- Footer -->
  @include('dashboard.includes.footer')
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>

@stop