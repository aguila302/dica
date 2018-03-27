<header class="main-header">
    <a class="logo" href="/inicio">
        {{-- <span class="logo-lg"><b>DICA-</b>Diagnostico Carretero</span> --}}
        <small>Diagnostico Carretero</small>
        {{-- <p class="navbar-text">Signed in as Mark Otto</p> --}}
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a class="sidebar-toggle" data-toggle="push-menu" href="#" role="button">
            <span class="sr-only">
                Toggle navigation
            </span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img alt="User Image" class="user-image" src="{{ asset('images/user3-128x128.jpg') }}">
                            <span class="hidden-xs">
                                {{ Auth::user()->name }}
                            </span>
                        </img>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img alt="User Image" class="img-circle" src="{{ asset('images/user3-128x128.jpg') }}">
                                <p>{{ Auth::user()->name }}<small>{{ Auth::user()->getRoleNames()->implode(',') }}</small></p>
                            </img>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a class="btn btn-default btn-flat" href="#">
                                    Ajustes
                                </a>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="#" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a data-toggle="control-sidebar" href="#">
                        <i class="fa fa-gears">
                        </i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>