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
    @yield('content')
  </div>


  <!-- Footer -->
  @include('fixed.footer')

  <!-- Bootstrap core JavaScript -->
  @include('fixed.scripts')

</body>

</html>
