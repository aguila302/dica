<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container">
                <img class="mr-3" src="{{ asset('images/image001.png') }}" alt="" width="150" height="48">
                {{-- <img class="mr-3" src="https://getbootstrap.com/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48"> --}}
                <a class="navbar-brand" href="{{ url('/inicio') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a class="navbar-brand" href="{{ url('/inicio') }}">
                    Diagnostico carretero
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @auth
            <div class="container" style="margin-top: 10px;">
                <div class="nav-scroller bg-white box-shadow">
                    <nav class="nav nav-underline">

                        <a class=" alert alert-secondary nav-link {{ Request::is('autopistas*') ? 'alert alert-secondary' : '' }}" href="{{ route('autopistas.index') }}" >Autopistas</a>
                    </nav>
                </div>
            </div>
        @endauth
        <main main role="main" class="container">
            <div class="my-3 p-3 bg-white rounded box-shadow">
                {{-- @include('flash::message') --}}
                @yield('content')
            </div>
        {{--     <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <p class="float-right"><a href="#">Back to top</a></p>
                <p>&copy; 2017-2018 CalyMayor <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer> --}}
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(150);
    </script>
</body>
</html>
