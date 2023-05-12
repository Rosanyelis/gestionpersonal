@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personal - Capacidades Educativas</h3>
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
                    @if ($errors->any())
                        <div class="alert alert-pro alert-danger">
                            <ul class="alert-text text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <form id="form" action="{{ url('/personal/'.$id.'/guardar-actividades-educativa') }}">
                                @csrf
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase active" data-toggle="tab" href="#tabItem5">
                                            <span>Carreras Universitarias</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem6">
                                            <span>Maestrías</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem7">
                                            <span>PHD</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem8">
                                            <span>Diplomados</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem9">
                                            <span>Cursos Técnicos</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem10">
                                            <span>Talleres</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem11">
                                            <span>De Participación</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    {{-- Carreras Universitarias --}}
                                    <div class="tab-pane active" id="tabItem5">
                                        @include('carreras.partials.create')
                                    </div>
                                    <div class="tab-pane" id="tabItem6">
                                        @include('maestrias.partials.create')
                                    </div>
                                    <div class="tab-pane" id="tabItem7">
                                        @include('phds.partials.create')
                                    </div>
                                    <div class="tab-pane" id="tabItem8">
                                        @include('diplomados.partials.create')
                                    </div>
                                    <div class="tab-pane" id="tabItem9">
                                        @include('cursos.partials.create')
                                    </div>
                                    <div class="tab-pane" id="tabItem10">
                                        @include('talleres.partials.create')
                                    </div>
                                    <div class="tab-pane" id="tabItem11">
                                        @include('participacion.partials.create')
                                    </div>
                                </div>
                                <div class="row g-gs ">
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group float-right">
                                            <input type="hidden" id="datosEducativos" name="carreras">
                                            <input type="hidden" id="datosMaestrias" name="maestrias">
                                            <input type="hidden" id="datosPhd" name="phd">
                                            <input type="hidden" id="datosDiplomados" name="diplomado">
                                            <input type="hidden" id="datosCursos" name="cursos">
                                            <input type="hidden" id="datosTalleres" name="talleres">
                                            <input type="hidden" id="datosParticipacion" name="participacion">

                                            <button id="guardar" class="btn btn-lg btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
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
                console.log(formDelete);
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

            var datosEducativos = [];
            var datosMaestrias = [];
            var datosPhd = [];
            var datosDiplomados = [];
            var datosCursos = [];
            var datosTalleres = [];
            var datosParticipacion = [];

            $('#aggCarrera').click(function() {
                let institucion = $('#institucion').val();
                let titulo = $('#titulo').val();
                let ano = $('#year').val();
                $("#Carrera tbody").append(
                    `<tr>
                    <td>` + institucion + `</td>
                    <td>` + titulo + `</td>
                    <td>` + ano + `</td>
                </tr>`);

                let datosFila = {};
                datosFila.institucion = institucion;
                datosFila.titulo = titulo;
                datosFila.ano = ano;
                datosEducativos.push(datosFila);

                $('#institucion').val('');
                $('#titulo').val('');
                $('#year').val('');
            });

            $('#aggMaestria').click(function() {
                let institucion = $('#institucion1').val();
                let titulo = $('#titulo1').val();
                let ano = $('#year1').val();
                $("#Maestria tbody").append(
                    `<tr>
                    <td>` + institucion + `</td>
                    <td>` + titulo + `</td>
                    <td>` + ano + `</td>
                </tr>`);

                let datosFila = {};
                datosFila.institucion = institucion;
                datosFila.titulo = titulo;
                datosFila.ano = ano;
                datosMaestrias.push(datosFila);

                $('#institucion1').val('');
                $('#titulo1').val('');
                $('#year1').val('');
            });

            $('#aggPHD').click(function() {
                let institucion = $('#institucion2').val();
                let titulo = $('#titulo2').val();
                let ano = $('#year2').val();
                $("#PHD tbody").append(
                    `<tr>
                    <td>` + institucion + `</td>
                    <td>` + titulo + `</td>
                    <td>` + ano + `</td>
                </tr>`);

                let datosFila = {};
                datosFila.institucion = institucion;
                datosFila.titulo = titulo;
                datosFila.ano = ano;
                datosPhd.push(datosFila);

                $('#institucion2').val('');
                $('#titulo2').val('');
                $('#year2').val('');
            });

            $('#aggDiplomados').click(function() {
                let institucion = $('#institucion3').val();
                let titulo = $('#titulo3').val();
                let ano = $('#year3').val();
                $("#Diplomados tbody").append(
                    `<tr>
                    <td>` + institucion + `</td>
                    <td>` + titulo + `</td>
                    <td>` + ano + `</td>
                </tr>`);

                let datosFila = {};
                datosFila.institucion = institucion;
                datosFila.titulo = titulo;
                datosFila.ano = ano;
                datosDiplomados.push(datosFila);

                $('#institucion3').val('');
                $('#titulo3').val('');
                $('#year3').val('');
            });

            $('#aggCursos').click(function() {
                let institucion = $('#institucion4').val();
                let titulo = $('#titulo4').val();
                let ano = $('#year4').val();
                $("#Cursos tbody").append(
                    `<tr>
                    <td>` + institucion + `</td>
                    <td>` + titulo + `</td>
                    <td>` + ano + `</td>
                </tr>`);

                let datosFila = {};
                datosFila.institucion = institucion;
                datosFila.titulo = titulo;
                datosFila.ano = ano;
                datosCursos.push(datosFila);

                $('#institucion4').val('');
                $('#titulo4').val('');
                $('#year4').val('');
            });

            $('#aggTalleres').click(function() {
                let institucion = $('#institucion5').val();
                let titulo = $('#titulo5').val();
                let ano = $('#year5').val();
                $("#Talleres tbody").append(
                    `<tr>
                    <td>` + institucion + `</td>
                    <td>` + titulo + `</td>
                    <td>` + ano + `</td>
                </tr>`);

                let datosFila = {};
                datosFila.institucion = institucion;
                datosFila.titulo = titulo;
                datosFila.ano = ano;
                datosTalleres.push(datosFila);

                $('#institucion5').val('');
                $('#titulo5').val('');
                $('#year5').val('');
            });

            $('#aggParticipacion').click(function() {
                let institucion = $('#institucion6').val();
                let titulo = $('#titulo6').val();
                let ano = $('#year6').val();
                $("#Participacion tbody").append(
                    `<tr>
                    <td>` + institucion + `</td>
                    <td>` + titulo + `</td>
                    <td>` + ano + `</td>
                </tr>`);

                let datosFila = {};
                datosFila.institucion = institucion;
                datosFila.titulo = titulo;
                datosFila.ano = ano;
                datosParticipacion.push(datosFila);

                $('#institucion6').val('');
                $('#titulo6').val('');
                $('#year6').val('');
            });

            $('#guardar').click(function() {
                $('#datosEducativos').val(JSON.stringify(datosEducativos));
                $('#datosMaestrias').val(JSON.stringify(datosMaestrias));
                $('#datosPhd').val(JSON.stringify(datosPhd));
                $('#datosDiplomados').val(JSON.stringify(datosDiplomados));
                $('#datosCursos').val(JSON.stringify(datosCursos));
                $('#datosTalleres').val(JSON.stringify(datosTalleres));
                $('#datosParticipacion').val(JSON.stringify(datosParticipacion));

                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>');
            });

        })(NioApp, jQuery);
    </script>
@endsection
