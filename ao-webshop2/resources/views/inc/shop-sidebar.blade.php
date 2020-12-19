<nav id="sidebarMenu" class="col-3 col-lg-2 d-md-block bg-light sidebar collapse text-left">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <a class="nav-link @if (url()->current() == route('admin.index')) text-danger @endif underline-none" aria-current="page" href="{{ route('shop.index')}}">All</a>
          @foreach ($categories as $item)
            <li class="nav-item @if (url()->current() == route('admin.index')) text-danger @endif">
                <form action="{{route('shop.index')}}" class="form" method="get">
                    @csrf

                    <input type="hidden" name="category" value="{{ $item->id }}">

                    <input type="submit" value="{{ $item->name }}" class="btn" >
                </form>
            </li>
          @endforeach
      </ul>
    </div>
  </nav>