<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search...">
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- Place this tag where you want the button to render. -->
      <li class="nav-item lh-1 me-3">
        <span></span>
      </li>


      @php
      if(Auth::user()->user_role=='customer')
      $user = DB::table('customers')->where(['userid' => Auth::user()->id])->first();
      elseif(Auth::user()->user_role=='vendor')
      $user = DB::table('suppliers')->where(['userid' => Auth::user()->id])->first();
      elseif(Auth::user()->user_role=='admin')
      $user = DB::table('users')->where(['id' => Auth::user()->id])->first();
      @endphp


      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        @if(Auth::user()->user_role!='admin')
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="{{Storage::url(Auth::user()->user_role=='vendor'?$user->logo:$user->picture)}}" alt="" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
          </div>
        </a>
        @else
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online" style="
    text-align: center;
    padding-top: 7px;
    font-weight: 900;
    border: 1px solid #9fa0c7;
    border-radius: 50%;
">
            A
          </div>
        </a>
        @endif
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  @if(Auth::user()->user_role!='admin')
                  <div class="avatar avatar-online">
                    <img src="{{Storage::url(Auth::user()->user_role=='vendor'?$user->logo:$user->picture)}}" alt="" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                  </div>
                  @else
                  <div class="avatar avatar-online" style="
    text-align: center;
    padding-top: 7px;
    font-weight: 900;
    border: 1px solid #9fa0c7;
    border-radius: 50%;
">
                    A
                  </div>
                  @endif
                </div>
                <div class="flex-grow-1">
                  @if(Auth::user()->user_role!='admin')
                  <span class="fw-semibold d-block">{{$user->fname}} {{$user->lname}}</span>
                  @else
                  <span class="fw-semibold d-block">{{$user->name}}</span>
                  @endif
                  <small class="text-muted">{{Auth::user()->user_role}}</small>

                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="{{url('dashboard')}}">
              <i class="bx bx-cog me-2"></i>
              <span class="align-middle">Home</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{url('/')}}">
              <i class="bx bx-cog me-2"></i>
              <span class="align-middle">Shop</span>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="{{url('logout')}}">
              <i class="bx bx-power-off me-2"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>