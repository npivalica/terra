<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.index') }}"><h1 class="h3">terra</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        @foreach($menu as $link)
            @if (session()->has('admin'))
                @if ($link->name === 'Login')
                    @continue
                @endif
            @elseif (session()->has('user'))
                @if ($link->name == 'Login' || $link->name == 'Admin')
                    @continue
                @endif
            @elseif ($link->name == 'Admin' || $link->name == 'Logout')
                @continue
            @endif
            <li class="nav-item @if(request()->routeIs($link->route)) active @endif">
                <a class="nav-link" href="{{ route($link->route) }}">{{ $link->name }}</a>
            </li>
        @endforeach
        </ul>
      </div>
    </div>
</nav>
