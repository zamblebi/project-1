<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project 01') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Icons  --}}

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <div id="theLoader">
           <span class="spinner"></span>
        </div>
        <loader-component :is-visible="isLoading"></loader-component>
        <div class="load"></div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-sticky-top">
            {{-- <menu-component></menu-component> --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container wrapper">
                    <div class="header-bar">

                        {{-- header brand  --}}
                    <a class="navbar-brand"  href="{{ url('/') }}">
                        <img class="logo" src="/logo.png" alt="">
                      MON PRESSING
                    </a>
                    {{-- Desktop menu  --}}
                        <ul class="navbar-nav-desktop" >

                            @if (Route::has('login'))
                                        @auth
                                        <li class="nav-item">
                                                <a href="{{ url('/order') }}" class="panier"><img class="shopping-icon" src="/icons/shopping-cart.svg" alt=""> <span>Mon Panier</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('/home/my-order-list') }}">Mon Profils</a>
                                            </li>
                                            @if(Auth::user()->usertype == 'admin')
                                            <li class="nav-item">
                                                    <a href="{{url('dashboard')}}">Dashboard</a>
                                                </li>
                                                @endif
                                            {{-- @else
                                                <a href="{{ route('login') }}">Connexion</a>

                                                @if (Route::has('register'))
                                                <a href="{{ route('register') }}">Inscription</a>
                                                @endif --}}
                                                @endauth

                                                {{-- </div>--}}
                                                @endif
                                                {{-- </nav> --}}
                                                {{-- @show --}}
                                                <!-- Authentication Links -->
                                @guest

                                <li class="nav-item">

                                                <a href="{{ url('/order') }}" class="panier"><img class="shopping-icon" src="/icons/shopping-cart.svg" alt=""> <span>Mon Panier</span></a>

                                    </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                               {{ __('Déconnexion') }}
                                            </a>
                                        </li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </li>
                                @endguest
                            </ul>
                            {{-- End Desktop menu  --}}


                            {{-- <p>test</p> --}}
                            <div class="toggle-menu">
                                <div class="toggle-panier">
                                    <a href="{{ url('/order') }}" class="panier"><img class="shopping-icon" src="/icons/shopping-cart.svg" alt=""> </a>
                                </div>

                                    <img id="menu-burger" src="/icons/menu.svg" alt="">
                            </div>
                        </div>
                                                <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a> -->
                        {{-- Mobile menu  --}}
                        <ul class="navbar-nav">

                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                    {{-- <li class="nav-item">
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ url('/home') }}">Mon profil</a>
                                    </li>
                                    {{-- @else
                                            <a href="{{ route('login') }}">Connexion</a>

                                            @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Inscription</a>
                                            @endif --}}
                                        @endauth

                                        {{-- </div>--}}
                                            @endif
                                            {{-- </nav> --}}
                                            {{-- @show --}}
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a href="{{ url('/order') }}" class="panier"><img class="shopping-icon" src="/icons/shopping-cart.svg" alt=""> <span>Mon Panier</span></a>
                            </li> --}}
                        <li class="nav-item">
                                <a href="{{ url('/home') }}">Mon profil</a>
                            </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   <li class="nav-item">
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                           {{ __('Déconnexion') }}
                                       </a>
                                   </li>

                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            </li>
                            @endguest
                        </ul>
                        {{-- Mobile menu  --}}
                        {{-- <div class="menu-all">

                        </div> --}}
                </div>
            </div>
        </nav>
        <div class="header-space"></div>

        <main class="py-4">
            @yield('content')
        </main>

        </div>
    </div>


</body>
</html>
