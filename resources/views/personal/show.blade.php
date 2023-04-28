@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personal - Ver Perfil de Personal</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/personal') }}" class="btn btn-secondary">
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
                                            href="#tabItem1"><span>Personal</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem2">
                                            <span>Ref. Personales/Fam.</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem3">
                                            <span>Act. Educativa</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem4">
                                            <span>Act. Laborales</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem5">
                                            <span>Inv. Integridad laboral</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem6">
                                            <span>Act. no Procesadas</span>
                                        </a>
                                    </li>
                                </ul><!-- .nav-tabs -->

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabItem1">
                                        <div class="card-inner">
                                            {{-- Bloque de Datos Personales --}}
                                            @include('includes.datos-personales')
                                            {{-- Bloque de Datos de Residencia --}}
                                            @include('includes.datos-residenciales')
                                            {{-- Bloque de Medicamentos --}}
                                            @include('includes.datos-medicamentos')
                                            {{-- Bloque de Enfermedad --}}
                                            @include('includes.datos-enfermedades')
                                            {{-- Bloque de Contactos de Emergencia --}}
                                            @include('includes.datos-contactos')
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabItem2">
                                        <div class="card-inner">
                                            {{-- Bloque de Datos de Referencia y Familiares --}}
                                            @include('includes.datos-referencia')
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabItem3">
                                        <div class="card-inner">
                                            {{-- Bloque Carreras Universitarias --}}
                                            @include('includes.datos-carreras')
                                            {{-- Bloque Maestrias --}}
                                            @include('includes.datos-maestrias')
                                            {{-- Bloque PHPDs --}}
                                            @include('includes.datos-phds')
                                            {{-- Bloque Diplomados --}}
                                            @include('includes.datos-diplomados')
                                            {{-- Bloque Cursos Tecnicos --}}
                                            @include('includes.datos-cursos')
                                            {{-- Bloque Talleres --}}
                                            @include('includes.datos-talleres')
                                            {{-- Bloque De Participacion --}}
                                            @include('includes.datos-participacion')
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabItem4">
                                        <div class="card-inner">
                                            {{-- Bloque de Datos de Experiencia Laboral --}}
                                            @include('includes.datos-laborales')
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabItem5">
                                        <div class="card-inner">
                                            {{-- Bloque de Datos de Experiencia Laboral --}}
                                            @include('includes.datos-invlaborales')
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabItem6">
                                        <div class="card-inner">
                                            @include('includes.datos-reportes')
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


            $('.datatable-init tbody').on('click', '.delete-record', function() {
                let dataid = $(this).data('id');
                let formDelete = $('#formDelete-' + dataid);
                Swal.fire({
                    title: '¿Está Seguro de Eliminar el Registro?',
                    text: "Si tiene datos dependientes, no podrá eliminarlo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, estoy seguro!'
                }).then((result) => {
                    if (result.value) {
                        $(formDelete).submit();
                    }
                });
            });
            $('.table tbody').on('click', '.delete-record', function() {
                let dataid = $(this).data('id');
                let formDelete = $('#formDelete-' + dataid);
                Swal.fire({
                    title: '¿Está Seguro de Eliminar el Registro?',
                    text: "Si tiene datos dependientes, no podrá eliminarlo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, estoy seguro!'
                }).then((result) => {
                    if (result.value) {
                        $(formDelete).submit();
                    }
                });
            });
        })(NioApp, jQuery);
    </script>
@endsection
