<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="javascript:void();" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img logo-img-lg" src="{{ asset('images/CITECSA.png') }}" width="180%" alt="logo">
                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('images/CITECSA.png') }}" width="180%" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Menu</h6>
                    </li><!-- .nk-menu-item -->
                    @role('Empresa')
                    <li class="nk-menu-item">
                        <a href="{{ url('/dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                            <span class="nk-menu-text">Inicio</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ url('personal') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Personal</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    @endrole
                    @role('Desarrollador|Administrador')
                    <li class="nk-menu-item">
                        <a href="{{ url('/dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                            <span class="nk-menu-text">Inicio</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ url('personal') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Personal</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ url('candidatos-externos') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                            <span class="nk-menu-text">Personal Externo</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ url('empresas') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-c"></em></span>
                            <span class="nk-menu-text">Empresas Clientes</span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:;" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            <span class="nk-menu-text">Configuraciones</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ url('configuraciones/roles') }}" class="nk-menu-link"><span class="nk-menu-text">Roles</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ url('configuraciones/usuarios') }}" class="nk-menu-link"><span class="nk-menu-text">Usuarios</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    @endrole
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
