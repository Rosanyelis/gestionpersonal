@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Crear Cursos</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/personal/' . $id . '/actividades-educativa') }}"
                                                class="btn btn-secondary">
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
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <form id="form"
                                action="{{ url('/personal/' . $id . '/cursos-tecnicos/guardar-curso') }}"
                                class="form-validate" method="POST">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Institución</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="institucion"
                                                    name="institucion" placeholder="Ejm: Universidad San Bernardo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">titulo</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="titulo" name="titulo"
                                                    placeholder="Ejm: licenciada en Contaduría">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Año</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="apellidos"
                                                    placeholder="Ejm: 2012">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="aggCarrera" type="button"
                                            class="btn btn-sm btn-success mt-4">Agregar</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="Carrera" class="table">
                                            <thead class="thead-light text-uppercase">
                                                <tr>
                                                    <th scope="col">Institución</th>
                                                    <th scope="col">Titulo</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
                                            <input type="hidden" id="datosCarreras" name="Arraycursos">
                                            <button type="button" id="guardar" class="btn btn-lg btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function(NioApp, $) {
            'use strict';

            var datosEducativos = [];
            $('#aggCarrera').click(function() {
                let institucion = $('#institucion').val();
                let titulo = $('#titulo').val();
                let ano = $('#year').val();
                $("#Carrera tbody").append(
                    `<tr>
                        <td>`+institucion+`</td>
                        <td>`+titulo+`</td>
                        <td>`+ano+`</td>
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

            $('#guardar').click(function() {
                $('#datosCarreras').val(JSON.stringify(datosEducativos));
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>');
            });

        })(NioApp, jQuery);
    </script>
@endsection
