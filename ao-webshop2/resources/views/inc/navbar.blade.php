<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">AO webshop2</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('main.index') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          @if (Auth::check() && Auth::user()->is_admin)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">admin</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#">
            {{ $category }}
          </a>
          </li> --}}
        </ul>
        {{-- <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
        @if (Auth::check())
          <a href="#" class="" type="submit">profile</a>
          <form action="{{route('logout')}}" class="form" method="post">
            @csrf
            <input type="submit" value="logout" class="btn btn-danger" >
          </form>
        @else 
          <a href="{{ route('registerForm') }}" class="btn btn-outline-secondary my-2 my-sm-0" type="submit">register</a>
          <a href="{{ route('loginForm') }}" class="btn btn-outline-primary my-2 my-sm-0" type="submit">login</a>
        @endif
      </div>
    </div>
    </nav>