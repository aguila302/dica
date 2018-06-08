<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            {{-- <li class="header">NAVEGACIÓN PRINCIPAL</li> --}}
            <li class="{{ Request::is(['autopistas*', 'inicio']) ? 'active' : '' }}">
                <a href="{{ route('autopistas.index') }}">
                    <i class="fa fa-fw fa-road"></i>
                    <span>Autopistas</span>
                </a>
            </li>
            <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
                <a href="{{ route('usuarios.index') }}">
                    <i class="fa fa-fw fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            <li class="{{ Request::is('elementos*') ? 'active' : '' }}">
                <a href="{{ route('elementos.index') }}">
                    <i class="fa fa-fw fa-retweet"></i>
                    <span>Elementos</span>
                </a>
            </li>
            <li class="{{ Request::is('seguridad*') ? 'active' : '' }}">
                <a href="{{ route('seguridad.index') }}">
                    <i class="fa fa-fw fa-expeditedssl"></i>
                    <span>Seguridad</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
        </ul>
    </section>
</aside>
