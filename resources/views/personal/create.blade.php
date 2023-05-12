@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personal - Nuevo Personal</h3>
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
                            <form id="form" action="{{ url('/personal/guardar-personal') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase active" data-toggle="tab" href="#tabItem5">
                                            <span>Datos Personales</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem6">
                                            <span>Datos Médicos</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem7">
                                            <span>Datos de Residencia</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem8">
                                            <span>Referencia Personal / Familiar</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Datos personales  -->
                                    @include('personal.partials.datos-personales')
                                    <!-- Datos Medicos -->
                                    @include('personal.partials.datos-medicos')
                                    <!-- Datos Residenciales  -->
                                    @include('personal.partials.datos-residenciales')
                                    <!-- Datos Referenciales  -->
                                    @include('personal.partials.datos-referenciales')
                                </div>
                                <div class="row g-gs">
                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
                                            <input type="hidden" id="datosReferencia" name="ArrayReferencia">
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

            var datosReferencias = [];

            $('#enfermedades').hide();
            $('#alergias').hide();
            $('#contactoEmergencia').hide();

            $('#enfermedadSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#enfermedades').show();
                }
            });
            $('#enfermedadNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#enfermedades').hide();
                }
            });

            $('#medicamentoSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#alergias').show();
                }
            });
            $('#medicamentoNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#alergias').hide();
                }
            });

            $('#contactoSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#contactoEmergencia').show();
                }
            });
            $('#contactoNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#contactoEmergencia').hide();
                }
            });

            $('.aggEnfermedad').click(function() {
                $("#enfermedades .row").append(
                    `
                    <div class="col-md-8 mt-2">
                        <div class="form-group">
                            <label class="form-label text-uppercase">Enfermedad</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="enfermedades[]" >
                            </div>
                        </div>
                    </div>`);
            });

            $('.aggAlergia').click(function() {
                $("#alergias .row").append(
                    `<div class="col-md-8 mt-2">
                        <div class="form-group">
                            <label class="form-label text-uppercase">Medicamento</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="alergias[]" >
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>`);
            });

            $('.aggContacto').click(function() {
                $("#contactoEmergencia .row").append(
                    `<div class="col-md-4 mt-2">
                        <div class="form-group">
                            <label class="form-label text-uppercase">Nombre y Apellido</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="contactos[]" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="form-group">
                            <label class="form-label text-uppercase">Teléfono</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="telefonos[]" >
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>`);
            });

            $('#provincia').on('change', function() {
                let id = $(this).val();
                let url = '{{ url('') }}' +'/personal/'+id+'/get-municipios';
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data.forEach(element => {
                            $('#municipio').append('<option value="'+element.nombre+'">'+element.nombre+'</option>');
                        });
                    }
                });
            });


            $('#aggReferencia').click(function() {
                let nombre = $('#ref-nombre').val();
                let cedula = $('#ref-cedula').val();
                let lugar = $('#ref-lugar').val();
                let telefono = $('#ref-telefono').val();
                let vinculo = $('#ref-vinculo').val();
                $("#Contacto tbody").append(
                    `<tr>
                        <td>`+nombre+`</td>
                        <td>`+cedula+`</td>
                        <td>`+lugar+`</td>
                        <td>`+telefono+`</td>
                        <td>`+vinculo+`</td>
                    </tr>`);

                let datosFila = {};
                datosFila.nombre = nombre;
                datosFila.cedula = cedula;
                datosFila.lugar = lugar;
                datosFila.telefono = telefono;
                datosFila.vinculo = vinculo;
                datosReferencias.push(datosFila);

                $('#ref-nombre').val('');
                $('#ref-cedula').val('');
                $('#ref-lugar').val('');
                $('#ref-telefono').val('');
                $('#ref-vinculo').val('');
            });

            $('#guardar').click(function() {
                $('#datosReferencia').val(JSON.stringify(datosReferencias));
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>');
            });
            @include('layouts.alerts')



        })(NioApp, jQuery);
    </script>
@endsection
