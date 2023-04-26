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
                        <form id="form" action="{{ url('/personal/'.$id.'/actividades-no-procesadas/'.$data->id.'/actualizar-reporte') }}" class="form-validate" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">tipo de reporte</label>
                                        <div class="form-control-select">
                                            <select class="form-control" name="tipo" id="tipo">
                                                <option value="default_option">Seleccione...</option>
                                                <option value="Robo" @if ($data->tipo_reporte == 'Robo') selected @endif>Robo</option>
                                                <option value="Intento Robo" @if ($data->tipo_reporte == 'Intento Robo') selected @endif>Intento Robo</option>
                                                <option value="Conflicto Social" @if ($data->tipo_reporte == 'Conflicto Social') selected @endif>Conflicto Social</option>
                                                <option value="Accidente Laboral" @if ($data->tipo_reporte == 'Accidente Laboral') selected @endif>Accidente Laboral</option>
                                                <option value="Accidente de Transito" @if ($data->tipo_reporte == 'Accidente de Transito') selected @endif>Accidente de Transito</option>
                                                <option value="Asistencia bajo alcohol" @if ($data->tipo_reporte == 'Asistencia bajo alcohol') selected @endif>Asistencia Bajo Alcohol</option>
                                                <option value="Llegadas Tardías" @if ($data->tipo_reporte == 'Llegadas Tardías') selected @endif>Llegadas Tardías</option>
                                                <option value="Pérdida de propiedades cargadas" @if ($data->tipo_reporte == 'Pérdida de propiedades cargadas') selected @endif>Pérdida de Propiedades Cargadas</option>
                                                <option value="Robo de Propiedades Cargadas" @if ($data->tipo_reporte == 'Robo de Propiedades Cargadas') selected @endif>Robo de Propiedades Cargadas</option>
                                                <option value="Conductor Reportado" @if ($data->tipo_reporte == 'Conductor Reportado') selected @endif>Conductor Reportado</option>
                                                <option value="Desvío de ruta" @if ($data->tipo_reporte == 'Desvío de ruta') selected @endif>Desvío de ruta</option>
                                                <option value="Víctima de Robo en Labores" @if ($data->tipo_reporte == 'Víctima de Robo en Labores') selected @endif>Víctima de Robo en Labores</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">detalles</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control " name="detalle" id="" cols="30" rows="10">{{ $data->detalles }}</textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group float-right">
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

            $('#guardar').click(function() {
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>');
            });

        })(NioApp, jQuery);
    </script>
@endsection
