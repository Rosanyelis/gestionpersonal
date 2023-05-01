@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personal Externo - Ver Perfil de Personal  Externo</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/candidatos-externos') }}" class="btn btn-secondary">
                                                <em class="icon ni ni-arrow-left"></em>
                                                <span>Regresar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card ">
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase active" data-toggle="tab"
                                            href="#tabItem1"><span>Datos Personales</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem2">
                                            <span>Inv. Integridad laboral</span>
                                        </a>
                                    </li>
                                </ul><!-- .nav-tabs -->

                                <div class="tab-content">
                                    <!-- Datos Personales -->
                                    <div class="tab-pane active" id="tabItem1">
                                        <div class="card-inner">
                                            @include('candidatoExterno.partials.datos-personales')
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabItem2">
                                        <div class="card-inner">
                                        {{-- Bloque de Datos de Experiencia Laboral --}}
                                            @include('candidatoExterno.partials.datos-investigacion-laboral')
                                        </div>
                                    </div>
                                </div>

                            </div><!-- .card-content -->

                        </div><!-- .card-aside-wrap -->
                    </div><!-- .c -->
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function(NioApp, $) {
            'use strict';

            @include('layouts.alerts')

        })(NioApp, jQuery);
    </script>
@endsection
