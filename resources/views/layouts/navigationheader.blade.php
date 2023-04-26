<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img" src="{{ asset('images/CITECSA.jpeg') }}" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('images/CITECSA.jpeg') }}" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-search ml-3 ml-xl-0">
                <div class="user-info">
                    <span class="sub-text">Si desea asistencia escribe al WhatsApp 809-722-0280</span>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <div class="user-status user-status-unverified text-center">
                                    @role('Empresa')
                                    {{ Auth::user()->empresa }}
                                    @endrole
                                    @role('Desarrollador|Administrador')
                                    CITECSA
                                    @endrole
                                    </div>
                                    <div class="user-name dropdown-indicator">Sr(a). {{ Auth::user()->name }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span><em class="icon ni ni-user-alt"></em></span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">Sr(a). {{ Auth::user()->name }}</span>
                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="dropdown-inner">
                                <ul class="link-list">

                                </ul>
                            </div> -->
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <form method="POST" action="{{ url('logout') }}">
                                            @csrf
                                            <a href="#" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                <em class="icon ni ni-signout"></em>
                                                <span>Cerrar Sesión</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
