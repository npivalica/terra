<!DOCTYPE html>
<html lang="en">

    @include('fixed.head')

<body>

  <!-- Navigation -->
  @include('fixed.navigation')

  @include('partials.success-message')
  @include('partials.error-message')
  <!-- Page Content -->
  <div class="container min-vh-100">
    <div class="row">
        <div class="col-lg-8 col-md-12 order-lg-1 order-md-2">
            @yield('posts')
        </div>
        <div class="col-lg-4 col-md-12 order-lg-2 order-md-1 my-3">
            @yield('search')
            @yield('categories')
        </div>
    </div>

  </div>


  <!-- Footer -->
  @include('fixed.footer')

  <!-- Bootstrap core JavaScript -->
  @include('fixed.scripts')

</body>

</html>
