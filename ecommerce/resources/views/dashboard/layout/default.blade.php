<!DOCTYPE html>
<html lang="en">

<head>
  @include('dashboard.includes.head')
  <title>Dashboard</title>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      @if(Auth::user()->user_role!='none')

      @include('dashboard.includes.nav')

      <div class="layout-page">
        @include('dashboard.includes.header')

        @yield('content')

      </div>

      @else
      @include('dashboard.includes.registration')
      @endif

    </div>

    @include('dashboard.includes.scripts')
</body>

</html>