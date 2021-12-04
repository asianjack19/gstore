<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>gstore</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @stack('styles')    
</head>
<body>
    <div class="container-fluid">
        @include('layouts.navbar')
        <div id="app">
            @guest
            <main class="content d-flex flex-row justify-content-center" style="background-color: #191c24">
            @else
            <main class="content d-flex flex-row" style="background-color: #191c24">
            @endguest
                <div class="d-flex" style="width: 20%" >
                    @if (Route::is('register') || Route::is('login') || Route::is('password.request') || Route::is('password.reset') || Route::is('password.email') || Route::is('password.update') || Route::is('password.confirm') || Route::is('email.verify'))
                    @else
                        @include('layouts.sidebar')
                    @endif
                </div>
                <div style="width: 80%">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
