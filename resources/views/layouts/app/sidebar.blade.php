<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVEGACIÓN PRINCIPAL</li>
            <li class="{{ Request::is(['autopistas*', 'inicio']) ? 'active' : '' }}">
                <a href="{{ route('autopistas.index') }}">
                    <i class="fa fa-fw fa-road"></i>
                    <span>Autopistas</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
