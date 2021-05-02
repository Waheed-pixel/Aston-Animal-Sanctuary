<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ASTON ANIMAL SANCTUARY</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                
                <img src="https://cdn.pixabay.com/photo/2016/11/26/19/12/abstract-1861446_960_720.png" alt="background Image" width=80px; height=60px;>
                Aston Animal Sanctuary
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                    
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif

                            
                        @else
                        {{--Link can only be seen by an admin user --}}
                            @if (Auth::user()->role === 1)

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}" >HOME</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('manageRequests') }}" >MANAGE ADOPTION REQUESTS </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('uploadNewAnimals') }}" >UPLOAD ANIMALS </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('showAnimals') }}" >DISPLAY ANIMALS </a>
                                </li>
                                
                            @endif

                            {{--Link can only be seen by a public user --}}
                            @if (Auth::user()->role === 0)

                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}" >HOME</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('showAnimals') }}" >DISPLAY & ADOPT ANIMALS </a>
                                </li>
                                                                
                                
                            @endif
                                                                        
                        <li class="nav-item ">                               
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('LOGOUT') }}
                            </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
