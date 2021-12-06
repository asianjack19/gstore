<link href="/css/gstore/sidebar.css" rel="stylesheet">
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="sidebar">
    <p class="text-success">CHECK OUT OUR CHAT APP</p>
    <a class="navbar-brand" href="https://www.gogriffy.com/">
        <img src="{{ url('/assets/images/go-griffy@1.1.png') }}" alt="">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{url('/home')}}" class="nav-link text-primary" >
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="{{url('/users')}}" class="nav-link text-primary">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Users
        </a>
      </li>
      <li>
        <a href="{{url('/products')}}" class="nav-link text-primary">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Products
        </a>
      </li>
      @guest
        
      @else
      <li>
        <a href="{{url('orders/?q='.Crypt::encrypt(Auth::user()->id))}}" class="nav-link text-primary">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Orders
        </a>
      </li>
      @endguest
      <li>
        <a href="{{url('/categories')}}" class="nav-link text-primary">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Categories
        </a>
      </li>
    </ul>
    <hr>
  </div>