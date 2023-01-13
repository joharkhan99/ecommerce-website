<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.includes.head')
  <title>Shop</title>
</head>

<body>
  @include('frontend.includes.header')

  @yield('content')

  @include('frontend.includes.footer')
  @include('frontend.includes.scripts')
</body>

</html>