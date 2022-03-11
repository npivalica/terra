<!DOCTYPE html>
<html lang="en">

    @include('fixed.head')

<body>

  <!-- Navigation -->
  @include('fixed.admin_navigation')

  <div class="container">
    <div class="row">
        <div class="col-lg-2">
            @include('fixed.sidenav')
        </div>
        <!-- Page Content -->
        <div class="col-lg-10">
            <div class="min-vh-100">
                <h1>@yield('page')</h1>

                @include('partials.success-message')
                @include('partials.error-message')
                @yield('content')
            </div>
        </div>
    </div>
  </div>

  <!-- Footer -->
  @include('fixed.admin_footer')

  <!-- Bootstrap core JavaScript -->
  @include('fixed.scripts')

</body>

</html>
