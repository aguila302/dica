<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <img src="{{ asset('images/image001.png') }}" alt="" width="150" style="height: auto;">
            <p class="navbar-text navbar-right">DICA - Diagnostico Carretero</p>
            {{-- <p class="navbar-text navbar-right"><a href="#" class="navbar-link">DICA - Diagnostico Carretero</a></p> --}}
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                @guest
                    <li><a href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>
                    {{-- <li><a href="{{ route('register') }}">{{ __('Registrar') }}</a></li> --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesión') }}
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
