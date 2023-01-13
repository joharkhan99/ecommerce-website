@extends('dashboard.layout.default')

@section('content')

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Orders Placed on Your Shop</h4>
    <div class="card py-4">
      <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr class="text-center">
              <th>s.No</th>
              <th>Title</th>
              <th>Customer</th>
              <th>Category</th>
              <th>Gender</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Media</th>
              <th>Created at</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php $i = 1; ?>
            @foreach($data['orders'] as $order)
            <tr class="text-center">
              <td class="py-4">{{ $i }}</td>
              <td class="py-4"><strong>{{ $order->productname }}</strong></td>
              <td class="py-4"><strong>{{ $order->fname }} {{ $order->lname }}</strong></td>
              <td class="py-4">{{ DB::table('category')->where('CategoryID' ,'=', $order->categoryid)->first()->name }}</td>
              <td class="py-4">{{ $order->gender }}</td>
              <td class="py-4">{{ $order->quantity }}</td>
              <td class="py-4"><span class="badge bg-label-success me-1">${{ $order->price * $order->quantity }}</span></td>
              <td class="py-4">
                @foreach(explode(',',$order->picture) as $img)
                <img src="{{ Storage::url($img) }}" width="80" alt="">
                @endforeach
              </td>
              <td class="py-4"><span class="badge bg-label-primary me-1">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($order->created_at))->diffForHumans() }}</span></td>
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