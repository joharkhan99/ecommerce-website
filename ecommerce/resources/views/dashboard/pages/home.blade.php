@extends('dashboard.layout.default')

@section('content')

<div class="content-wrapper">
  <!-- Content -->

  @if(Auth::check() && Auth::user()->user_role=='vendor')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Congratulations {{ Auth::user()->name }}! 🎉</h5>
                <p class="mb-4">
                  You have done <span class="fw-bold">72%</span> more sales today. Keep selling more.
                </p>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="{{asset('images/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{asset('images/chart-success.png')}}" alt="chart success" class="rounded">
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Profit</span>
                <h3 class="card-title mb-2">${{number_format($data['profit'], 0, ',')}}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{asset('images/wallet-info.png')}}" alt="Credit Card" class="rounded">
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span>Sales</span>
                <h3 class="card-title text-nowrap mb-1">${{number_format($data['sales'], 0, ',')}}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Revenue -->
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
          <div class="row row-bordered g-0">
            <div class="col-md-8">
              <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
              <div id="totalRevenueChart" class="px-2" style="min-height: 315px;">
              </div>
              <div class="resize-triggers">
                <div class="expand-trigger">
                  <div style="width: 456px; height: 377px;"></div>
                </div>
                <div class="contract-trigger"></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card-body">
                <div class="text-center">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      2022
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                      <a class="dropdown-item" href="javascript:void(0);">2021</a>
                      <a class="dropdown-item" href="javascript:void(0);">2020</a>
                      <a class="dropdown-item" href="javascript:void(0);">2019</a>
                    </div>
                  </div>
                </div>
              </div>
              <div id="growthChart" style="min-height: 154.875px;">
              </div>
              <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

              <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                <div class="d-flex">
                  <div class="me-2">
                    <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                  </div>
                  <div class="d-flex flex-column">
                    <small>2022</small>
                    <h6 class="mb-0">${{number_format(array_sum($data['rev_2022']),0,',')}}</h6>
                  </div>
                </div>
                <div class="d-flex">
                  <div class="me-2">
                    <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                  </div>
                  <div class="d-flex flex-column">
                    <small>2023</small>
                    <h6 class="mb-0">${{number_format(array_sum($data['rev_2023']),0,',')}}</h6>
                  </div>
                </div>
              </div>
              <div class="resize-triggers">
                <div class="expand-trigger">
                  <div style="width: 229px; height: 377px;"></div>
                </div>
                <div class="contract-trigger"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Total Revenue -->
      <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{asset('images/paypal.png')}}" alt="Credit Card" class="rounded">
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="d-block mb-1">Payments</span>
                <h3 class="card-title text-nowrap mb-2">${{number_format($data['sales'], 0, ',')}}</h3>
                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
              </div>
            </div>
          </div>
          <div class="col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{asset('images/cc-primary.png')}}" alt="Credit Card" class="rounded">
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Transactions</span>
                <h3 class="card-title mb-2">${{number_format($data['profit'], 0, ',')}}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
              </div>
            </div>
          </div>
          <!-- </div>
    <div class="row"> -->
          <div class="col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                  <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                      <h5 class="text-nowrap mb-2">Profile Report</h5>
                      <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                    </div>
                    <div class="mt-sm-auto">
                      <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 68.2%</small>
                      <h3 class="mb-0">${{number_format($data['profit'], 0, ',')}}</h3>
                    </div>
                  </div>
                  <div id="profileReportChart" style="min-height: 80px;">
                  </div>
                  <div class="resize-triggers">
                    <div class="expand-trigger">
                      <div style="width: 281px; height: 117px;"></div>
                    </div>
                    <div class="contract-trigger"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Order Statistics -->
      <!-- <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Order Statistics</h5>
              <small class="text-muted">42.82k Total Sales</small>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
              <div class="d-flex flex-column align-items-center gap-1">
                <h2 class="mb-2">8,258</h2>
                <span>Total Orders</span>
              </div>
              <div id="orderStatisticsChart" style="min-height: 137.55px;">
              </div>
              <div class="resize-triggers">
                <div class="expand-trigger">
                  <div style="width: 281px; height: 139px;"></div>
                </div>
                <div class="contract-trigger"></div>
              </div>
            </div>
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Electronic</h6>
                    <small class="text-muted">Mobile, Earbuds, TV</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">82.5k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Fashion</h6>
                    <small class="text-muted">T-shirt, Jeans, Shoes</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">23.8k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Decor</h6>
                    <small class="text-muted">Fine Art, Dining</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">849k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-football"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Sports</h6>
                    <small class="text-muted">Football, Cricket Kit</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">99</small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div> -->
      <!--/ Order Statistics -->

      <!-- Expense Overview -->
      <div class="col-md-8 col-lg-8 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header">
            <h5 class="card-title m-0 me-2">Profits & Expenses</h5>
          </div>
          <div class="card-body px-0">
            <div class="tab-content p-0">
              <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel" style="position: relative;">
                <div class="d-flex p-4 pt-3">
                  <div class="avatar flex-shrink-0 me-3">
                    <img src="{{asset('images/wallet-info.png')}}" alt="User">
                  </div>
                  <div>
                    <small class="text-muted d-block">Total Balance</small>
                    <div class="d-flex align-items-center">
                      <h6 class="mb-0 me-1">${{number_format($data['sales'], 0, ',')}}</h6>
                      <small class="text-success fw-semibold">
                        <i class="bx bx-chevron-up"></i>
                        42.9%
                      </small>
                    </div>
                  </div>
                </div>
                <div id="incomeChart" style="min-height: 215px;">
                </div>
                <div class="d-flex justify-content-center pt-4 gap-2">
                  <div class="flex-shrink-0" style="position: relative;">
                    <div id="expensesOfWeek" style="min-height: 57.7px;">
                    </div>
                    <div class="resize-triggers">
                      <div class="expand-trigger">
                        <div style="width: 61px; height: 59px;"></div>
                      </div>
                      <div class="contract-trigger"></div>
                    </div>
                  </div>
                  <div>
                    <p class="mb-n1 mt-1">Expenses This Week</p>
                    <small class="text-muted">$39 less than last week</small>
                  </div>
                </div>
                <div class="resize-triggers">
                  <div class="expand-trigger">
                    <div style="width: 329px; height: 377px;"></div>
                  </div>
                  <div class="contract-trigger"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Expense Overview -->

      <!-- Transactions -->
      <div class="col-md-6 col-lg-4 order-2 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Transactions</h5>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{asset('images/paypal.png')}}" alt="User" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">Paypal</small>
                    <h6 class="mb-0">Send money</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">+82.6</h6>
                    <span class="text-muted">USD</span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ Transactions -->
    </div>
  </div>

  @elseif(Auth::check() && Auth::user()->user_role=='customer')

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 style="background-color: rgba(43,44,64,.96)" class="p-4 my-2 mb-5 rounded">Recently Listed Products for You!!</h4>
    <div class="row">
      @foreach($data['user_top'] as $product)
      <div class="col-md-6 col-lg-4 my-2">
        <div class="card">
          <img class="card-img-top" style="height: 200px;" src="{{Storage::url(explode(',', $product->picture)[0])}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $product->productname }}</h5>
          </div>
          <div class="card-body border-top d-flex justify-content-between align-items-center">
            <p>Price: ${{ $product->price }}</p>
            <a href="{{url('product/'.$product->ProductID)}}" target="_blank" class="w-50 btn btn-primary d-block">Visit</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  @elseif(Auth::check() && Auth::user()->user_role=='admin')

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <!-- Expense Overview -->
      <div class="col-md-8 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header">
            <h5 class="card-title m-0 me-2">Users Regsitered on Website</h5>
          </div>
          <div class="card-body px-0">
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Started on</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach($data['users'] as $user)
                  <tr>
                    <td><b>{{$user->name}}</b></td>
                    <td>{{$user->email}}</td>
                    <td><span class="badge {{$user->user_role=='customer'?'bg-label-info':'bg-label-success'}} me-1">{{$user->user_role}}</span></td>
                    <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--/ Expense Overview -->

      <!-- Transactions -->
      <div class="col-md-4 order-2 mb-4" id="categories">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Categories</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
              Add
            </button>

            <!-- Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form id="catform">
                    @csrf
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nameBasic" class="form-label">Name</label>
                          <input type="text" name="name" id="cat_name" class="form-control" placeholder="Enter Name" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nameBasic" class="form-label">Description</label>
                          <textarea name="description" id="cat_description" class="form-control" placeholder="Enter Description" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0" id="catlist">
              @foreach($data['categories'] as $cat)
              <li class="d-flex mb-1 pb-1">
                <div class="avatar flex-shrink-0 me-3" style="
    border: 1px solid;
    text-align: center;
    border-radius: 50%;
    padding-top: 5px;
    font-weight: 700;
    width: 30px;
    height: 30px;
    font-size: 12px;
">
                  {{strtoupper(substr($cat->name,0,1))}}
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">{{substr($cat->description,0,15)}} ...</small>
                    <h6 class="mb-0" style="font-size: 12px;">{{strtoupper($cat->name)}}</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0" style="font-size: 12px;">{{$cat->CategoryID}}</h6>
                  </div>
                </div>
              </li>
              @endforeach


            </ul>
          </div>
        </div>
      </div>
      <!--/ Transactions -->

    </div>

    <div class="row">
      <div class="col-md-12 mb-4">
        <div class="card h-100">
          <div class="card-header">
            <h5 class="card-title m-0 me-2">Products Listed on Website</h5>
          </div>
          <div class="card-body px-0">
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Media</th>
                    <th>Gender</th>
                    <th>Quantity</th>
                    <th>Created on</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach($data['products'] as $product)
                  <tr>
                    <td><b>{{$product->productname}}</b></td>
                    <td><span class="badge bg-label-success me-1">${{$product->price}}</span></td>
                    <td><span class="badge bg-label-secondary me-1"> {{$product->name}} </span> </td>

                    <td>
                      @foreach(explode(',',$product->picture) as $img)
                      <img src="{{ Storage::url($img) }}" width="80" alt="">
                      @endforeach
                    </td>

                    <td><span class="badge bg-label-danger me-1" style="
    background: pink !important;
    color: #f3193f !important;
">{{ $product->gender }}</span></td>

                    <td>{{{ $product->quantity }}}</span></td>

                    <td><span class="badge bg-label-primary me-1">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans() }}</span></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>

  @endif
  <!-- / Content -->

  <!-- Footer -->
  @include('dashboard.includes.footer')
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>

<!-- Vendors JS -->
<script src="{{asset('js/apexcharts.js')}}"></script>

<script>
  (function() {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    // Total Revenue Report Chart - Bar Chart
    // --------------------------------------------------------------------
    const totalRevenueChartEl = document.querySelector("#totalRevenueChart"),
      totalRevenueChartOptions = {
        series: [{
            name: "2023",
            data: <?php echo json_encode($data['rev_2023']) ?>,
          },
          {
            name: "2022",
            data: <?php echo json_encode($data['rev_2022']) ?>,
          },
        ],
        chart: {
          height: 300,
          stacked: true,
          type: "bar",
          toolbar: {
            show: false
          },
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: "33%",
            borderRadius: 12,
            startingShape: "rounded",
            endingShape: "rounded",
          },
        },
        colors: [config.colors.primary, config.colors.info],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: "smooth",
          width: 0,
          lineCap: "round",
          colors: [cardColor],
        },
        legend: {
          show: true,
          horizontalAlign: "left",
          position: "top",
          markers: {
            height: 8,
            width: 8,
            radius: 12,
            offsetX: -3,
          },
          labels: {
            colors: axisColor,
          },
          itemMargin: {
            horizontal: 10,
          },
        },
        grid: {
          borderColor: borderColor,
          padding: {
            top: 0,
            bottom: -8,
            left: 20,
            right: 20,
          },
        },
        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
          labels: {
            style: {
              fontSize: "13px",
              colors: axisColor,
            },
          },
          axisTicks: {
            show: false,
          },
          axisBorder: {
            show: false,
          },
        },
        yaxis: {
          labels: {
            style: {
              fontSize: "13px",
              colors: axisColor,
            },
          },
        },
        responsive: [{
            breakpoint: 1700,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "32%",
                },
              },
            },
          },
          {
            breakpoint: 1580,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "35%",
                },
              },
            },
          },
          {
            breakpoint: 1440,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "42%",
                },
              },
            },
          },
          {
            breakpoint: 1300,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "48%",
                },
              },
            },
          },
          {
            breakpoint: 1200,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "40%",
                },
              },
            },
          },
          {
            breakpoint: 1040,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 11,
                  columnWidth: "48%",
                },
              },
            },
          },
          {
            breakpoint: 991,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "30%",
                },
              },
            },
          },
          {
            breakpoint: 840,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "35%",
                },
              },
            },
          },
          {
            breakpoint: 768,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "28%",
                },
              },
            },
          },
          {
            breakpoint: 640,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "32%",
                },
              },
            },
          },
          {
            breakpoint: 576,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "37%",
                },
              },
            },
          },
          {
            breakpoint: 480,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "45%",
                },
              },
            },
          },
          {
            breakpoint: 420,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "52%",
                },
              },
            },
          },
          {
            breakpoint: 380,
            options: {
              plotOptions: {
                bar: {
                  borderRadius: 10,
                  columnWidth: "60%",
                },
              },
            },
          },
        ],
        states: {
          hover: {
            filter: {
              type: "none",
            },
          },
          active: {
            filter: {
              type: "none",
            },
          },
        },
      };
    if (
      typeof totalRevenueChartEl !== undefined &&
      totalRevenueChartEl !== null
    ) {
      const totalRevenueChart = new ApexCharts(
        totalRevenueChartEl,
        totalRevenueChartOptions
      );
      totalRevenueChart.render();
    }

    // Growth Chart - Radial Bar Chart
    // --------------------------------------------------------------------
    const growthChartEl = document.querySelector("#growthChart"),
      growthChartOptions = {
        series: [78],
        labels: ["Growth"],
        chart: {
          height: 240,
          type: "radialBar",
        },
        plotOptions: {
          radialBar: {
            size: 150,
            offsetY: 10,
            startAngle: -150,
            endAngle: 150,
            hollow: {
              size: "55%",
            },
            track: {
              background: "transparent",
              strokeWidth: "100%",
            },
            dataLabels: {
              name: {
                offsetY: 15,
                color: headingColor,
                fontSize: "15px",
                fontWeight: "600",
                fontFamily: "Public Sans",
              },
              value: {
                offsetY: -25,
                color: headingColor,
                fontSize: "22px",
                fontWeight: "500",
                fontFamily: "Public Sans",
              },
            },
          },
        },
        colors: [config.colors.primary],
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            shadeIntensity: 0.5,
            gradientToColors: [config.colors.primary],
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 0.6,
            stops: [30, 70, 100],
          },
        },
        stroke: {
          dashArray: 5,
        },
        grid: {
          padding: {
            top: -35,
            bottom: -10,
          },
        },
        states: {
          hover: {
            filter: {
              type: "none",
            },
          },
          active: {
            filter: {
              type: "none",
            },
          },
        },
      };
    if (typeof growthChartEl !== undefined && growthChartEl !== null) {
      const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
      growthChart.render();
    }

    // Profit Report Line Chart
    // --------------------------------------------------------------------
    const profileReportChartEl = document.querySelector("#profileReportChart"),
      profileReportChartConfig = {
        chart: {
          height: 80,
          // width: 175,
          type: "line",
          toolbar: {
            show: false,
          },
          dropShadow: {
            enabled: true,
            top: 10,
            left: 5,
            blur: 3,
            color: config.colors.warning,
            opacity: 0.15,
          },
          sparkline: {
            enabled: true,
          },
        },
        grid: {
          show: false,
          padding: {
            right: 8,
          },
        },
        colors: [config.colors.warning],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          width: 5,
          curve: "smooth",
        },
        series: [{
          data: <?php echo json_encode($data['profile_report']) ?>,
        }, ],
        xaxis: {
          show: false,
          lines: {
            show: false,
          },
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          },
        },
        yaxis: {
          show: false,
        },
      };
    if (
      typeof profileReportChartEl !== undefined &&
      profileReportChartEl !== null
    ) {
      const profileReportChart = new ApexCharts(
        profileReportChartEl,
        profileReportChartConfig
      );
      profileReportChart.render();
    }

    // Order Statistics Chart
    // --------------------------------------------------------------------
    const chartOrderStatistics = document.querySelector(
        "#orderStatisticsChart"
      ),
      orderChartConfig = {
        chart: {
          height: 165,
          width: 130,
          type: "donut",
        },
        labels: ["Electronic", "Sports", "Decor", "Fashion"],
        series: [85, 15, 50, 50],
        colors: [
          config.colors.primary,
          config.colors.secondary,
          config.colors.info,
          config.colors.success,
        ],
        stroke: {
          width: 5,
          colors: "transparent",
        },
        dataLabels: {
          enabled: false,
          formatter: function(val, opt) {
            return parseInt(val) + "%";
          },
        },
        legend: {
          show: false,
        },
        grid: {
          padding: {
            top: 0,
            bottom: 0,
            right: 15,
          },
        },
        plotOptions: {
          pie: {
            donut: {
              size: "75%",
              labels: {
                show: true,
                value: {
                  fontSize: "1.5rem",
                  fontFamily: "Public Sans",
                  color: headingColor,
                  offsetY: -15,
                  formatter: function(val) {
                    return parseInt(val) + "%";
                  },
                },
                name: {
                  offsetY: 20,
                  fontFamily: "Public Sans",
                },
                total: {
                  show: true,
                  fontSize: "0.8125rem",
                  color: axisColor,
                  label: "Weekly",
                  formatter: function(w) {
                    return "38%";
                  },
                },
              },
            },
          },
        },
      };
    if (
      typeof chartOrderStatistics !== undefined &&
      chartOrderStatistics !== null
    ) {
      const statisticsChart = new ApexCharts(
        chartOrderStatistics,
        orderChartConfig
      );
      statisticsChart.render();
    }

    // Income Chart - Area chart
    // --------------------------------------------------------------------
    const incomeChartEl = document.querySelector("#incomeChart"),
      incomeChartConfig = {
        series: [{
          data: <?php echo json_encode($data['profile_report']) ?>,
        }, ],
        chart: {
          height: 215,
          parentHeightOffset: 0,
          parentWidthOffset: 0,
          toolbar: {
            show: false,
          },
          type: "area",
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          width: 2,
          curve: "smooth",
        },
        legend: {
          show: false,
        },
        markers: {
          size: 6,
          colors: "transparent",
          strokeColors: "transparent",
          strokeWidth: 4,
          discrete: [{
            fillColor: config.colors.white,
            seriesIndex: 0,
            dataPointIndex: 7,
            strokeColor: config.colors.primary,
            strokeWidth: 2,
            size: 6,
            radius: 8,
          }, ],
          hover: {
            size: 7,
          },
        },
        colors: [config.colors.primary],
        fill: {
          type: "gradient",
          gradient: {
            shade: shadeColor,
            shadeIntensity: 0.6,
            opacityFrom: 0.5,
            opacityTo: 0.25,
            stops: [0, 95, 100],
          },
        },
        grid: {
          borderColor: borderColor,
          strokeDashArray: 3,
          padding: {
            top: -20,
            bottom: -8,
            left: -10,
            right: 8,
          },
        },
        xaxis: {
          categories: [
            "",
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
          ],
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: true,
            style: {
              fontSize: "13px",
              colors: axisColor,
            },
          },
        },
        yaxis: {
          labels: {
            show: false,
          },
          min: 10,
          max: 50,
          tickAmount: 4,
        },
      };
    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
      const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
      incomeChart.render();
    }

    // Expenses Mini Chart - Radial Chart
    // --------------------------------------------------------------------
    const weeklyExpensesEl = document.querySelector("#expensesOfWeek"),
      weeklyExpensesConfig = {
        series: [65],
        chart: {
          width: 60,
          height: 60,
          type: "radialBar",
        },
        plotOptions: {
          radialBar: {
            startAngle: 0,
            endAngle: 360,
            strokeWidth: "8",
            hollow: {
              margin: 2,
              size: "45%",
            },
            track: {
              strokeWidth: "50%",
              background: borderColor,
            },
            dataLabels: {
              show: true,
              name: {
                show: false,
              },
              value: {
                formatter: function(val) {
                  return "$" + parseInt(val);
                },
                offsetY: 5,
                color: "#697a8d",
                fontSize: "13px",
                show: true,
              },
            },
          },
        },
        fill: {
          type: "solid",
          colors: config.colors.primary,
        },
        stroke: {
          lineCap: "round",
        },
        grid: {
          padding: {
            top: -10,
            bottom: -15,
            left: -10,
            right: -10,
          },
        },
        states: {
          hover: {
            filter: {
              type: "none",
            },
          },
          active: {
            filter: {
              type: "none",
            },
          },
        },
      };
    if (typeof weeklyExpensesEl !== undefined && weeklyExpensesEl !== null) {
      const weeklyExpenses = new ApexCharts(
        weeklyExpensesEl,
        weeklyExpensesConfig
      );
      weeklyExpenses.render();
    }
  })();
</script>

@stop