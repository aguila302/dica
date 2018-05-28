<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('autopistas.index') }}"><i class="fa fa-fw fa-arrow-left"></i>Regresar a autopistas</a>
            </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            {{-- <li class="header">NAVEGACIÓN PRINCIPAL</li> --}}

            <li class="{{ Request::is("autopista/{$autopista->id}/levantamientos*") ? ' active' : '' }}">
                <a href="{{ route('levantamientos.index', $autopista) }}">
                    <i class="fa fa-fw fa-retweet"></i>
                    <span>Levantamientos</span>
                </a>
            </li>

            <li class="{{ Request::is("autopista/{$autopista->id}/reportes*") ? ' active' : '' }}">
                <a href="#">
                    <i class="fa fa-fw fa-table"></i>
                    <span>Repotes</span>
                </a>
            </li>

        </ul>
    </section>
</aside>
