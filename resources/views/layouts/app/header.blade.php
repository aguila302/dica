<header class="main-header">
    <a class="logo" href="/home">
        <span class="logo-lg"><b>ERP-</b>NAOBATEC</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a class="sidebar-toggle" data-toggle="push-menu" href="#" role="button">
            <span class="sr-only">
                Toggle navigation
            </span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope-o">
                        </i>
                        <span class="label label-success">
                            4
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                            You have 4 messages
                        </li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img alt="User Image" class="img-circle" src="{{ asset('images/user3-128x128.jpg') }}">
                                            </img>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small>
                                                <i class="fa fa-clock-o">
                                                </i>
                                                5 mins
                                            </small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">
                                See All Messages
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img alt="User Image" class="user-image" src="{{ asset('images/user3-128x128.jpg') }}">
                            <span class="hidden-xs">
                                Alexander Pierce
                            </span>
                        </img>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img alt="User Image" class="img-circle" src="{{ asset('images/user3-128x128.jpg') }}">
                                <p>Alexander Pierce - Web Developer<small>Member since Nov. 2012</small></p>
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
