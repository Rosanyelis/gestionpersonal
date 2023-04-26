@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Crear Reporte de Actividad No Pocesada</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('/personal/'.$id.'/actividades-no-procesadas/') }}" class="btn btn-secondary">
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
                        <form id="form" action="{{ url('/personal/'.$id.'/actividades-no-procesadas/guardar-reporte') }}" class="form-validate" method="POST">
                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">tipo de reporte</label>
                                        <div class="form-control-select">
                                            <select class="form-control" name="tipo" id="tipo">
                                                <option value="default_option">Seleccione...</option>
                                                <option value="Robo">Robo</option>
                                                <option value="Intento Robo">Intento Robo</option>
                                                <option value="Conflicto Social">Conflicto Social</option>
                                                <option value="Accidente Laboral">Accidente Laboral</option>
                                                <option value="Accidente de Transito">Accidente de Transito</option>
                                                <option value="Asistencia bajo alcohol">Asistencia Bajo Alcohol</option>
                                                <option value="Llegadas Tardías">Llegadas Tardías</option>
                                                <option value="Pérdida de propiedades cargadas">Pérdida de Propiedades Cargadas</option>
                                                <option value="Robo de Propiedades Cargadas">Robo de Propiedades Cargadas</option>
                                                <option value="Conductor Reportado">Conductor Reportado</option>
                                                <option value="Desvío de ruta">Desvío de ruta</option>
                                                <option value="Víctima de Robo en Labores">Víctima de Robo en Labores</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">detalles</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control " id="detalle" placeholder="Ejm: Lorem ipsum dolor sit amet">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button id="aggContacto" type="button" class="btn btn-md btn-success mt-4">Agregar</button>
                                </div>
                                <div class="col-md-12 table-responsive">
                                    <table id="Contacto" class="table">
                                        <thead class="thead-light text-uppercase">
                                            <tr>
                                                <th scope="col">Tipo de Reporte</th>
                                                <th scope="col">Detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="form-group float-right">
                                    <input type="hidden" id="datosContacto" name="ArrayReporte">
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

            var datosContactos = [];
            $('#aggContacto').click(function() {
                let tipo = $('#tipo').val();
                let detalle = $('#detalle').val();
                $("#Contacto tbody").append(
                    `<tr>
                        <td>`+tipo+`</td>
                        <td class="text-ellipsis">`+detalle+`</td>
                    </tr>`);

                let datosFila = {};
                datosFila.tipo = tipo;
                datosFila.detalle = detalle;
                datosContactos.push(datosFila);


                $('#tipo').val('');
                $('#detalle').val('');
            });

            $('#guardar').click(function() {
                $('#datosContacto').val(JSON.stringify(datosContactos));
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>');
            });

        })(NioApp, jQuery);
    </script>
@endsection
