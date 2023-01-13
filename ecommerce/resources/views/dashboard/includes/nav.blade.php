<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link text-center w-100 d-block">
      <span class="app-brand-text demo menu-text fw-bolder ms-2 text-center"><i>Closet</i></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow" style="display: block;"></div>

  <ul class="menu-inner py-1 ps ps--active-y pt-4">
    @if(Auth::check() && Auth::user()->user_role=='vendor')

    <li class="menu-item active mb-3">
      <a href="{{ url('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <li class="menu-item mb-3">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons bx bxs-package'></i>
        <div data-i18n="Layouts">Product</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('view_product') }}" class="menu-link">
            <div data-i18n="Without menu">View Products</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ url('add_product') }}" class="menu-link">
            <div data-i18n="Without navbar">Add Product</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item mb-3">
      <a href="{{ url('your_reviews') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-message-dots"></i>
        <div data-i18n="Analytics">Customer Feedbacks</div>
      </a>
    </li>

    <li class="menu-item mb-3">
      <a href="{{ url('your_orders') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-clipboard"></i>
        <div data-i18n="Analytics">Your Orders</div>
      </a>
    </li>

    <li class="menu-item mb-3">
      <a href="{{ url('/') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxl-internet-explorer"></i>
        <div data-i18n="Analytics">Main Website</div>
      </a>
    </li>
    <li class="menu-item mb-3">
      <a href="{{ url('logout') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
        <div data-i18n="Analytics">Logout</div>
      </a>
    </li>

    @elseif(Auth::check() && Auth::user()->user_role=='customer')
    <li class="menu-item mb-3 active">
      <a href="{{ url('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Home</div>
      </a>
    </li>
    <li class="menu-item mb-3">
      <a href="{{ url('product_history') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-history"></i>
        <div data-i18n="Analytics">Products History</div>
      </a>
    </li>
    <li class="menu-item mb-3">
      <a href="{{ url('your_reviews') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-message-dots"></i>
        <div data-i18n="Analytics">Your Reviews</div>
      </a>
    </li>
    <!-- <li class="menu-item mb-3">
      <a href="{{ url('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Analytics">Settings</div>
      </a>
    </li> -->
    <li class="menu-item mb-3">
      <a href="{{ url('/') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bxl-internet-explorer"></i>
        <div data-i18n="Analytics">Main Website</div>
      </a>
    </li>
    <li class="menu-item mb-3">
      <a href="{{ url('logout') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-log-out-circle"></i>
        <div data-i18n="Analytics">Logout</div>
      </a>
    </li>
    @endif

    <div class="ps__rail-x" style="left: 0px; bottom: -793px;">
      <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 793px; height: 98px; right: 4px;">
      <div class="ps__thumb-y" tabindex="0" style="top: 88px; height: 10px;"></div>
    </div>
  </ul>
</aside>