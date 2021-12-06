<link href="/css/gstore/navbar.css" rel="stylesheet">
<nav class="navbar navbar-expand-md navbar-light shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="{{ url('/assets/images/gstore@1.2.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
              
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('home') ||Route::has('login') || Route::has('register') || Route::is('*.details')|| Route::is('*.profile') || Route::is('*.upload') || Route::is('*.edit') || Route::is('*.balance') || Route::is('categories.*') || Route::is('*.page') || Route::is('*.create') || Route::is('*.list'))
                            
                    @else
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    @endif  
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                {{-- if route has user.details or product.details --}}
                    @if (Route::has('home') || Route::is('*.details')|| Route::is('*.profile') || Route::is('*.edit') || Route::is('*.upload') || Route::is('*.update')|| Route::is('*.balance')|| Route::is('categories.*')|| Route::is('*.page') || Route::is('*.create') || Route::is('*.list'))
                    
                    @else
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <div>
                                <a class="dropdown-item" href="{{ url('users/details/?q='.Crypt::encrypt(Auth::user()->id)); }}">Profile Details</a>
                            </div>
                            <div>
                                <a class="dropdown-item" href="{{ url('users/profile/?q='.Crypt::encrypt(Auth::user()->id)); }}">Edit Profile</a>
                            </div>
                            <div>
                                <a class="dropdown-item" href="{{ url('users/topup/?q='.Crypt::encrypt(Auth::user()->id)); }}">Topup Balance</a>
                            </div>
                            <div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
    
                            </div>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>