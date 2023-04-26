@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Crear Estatus Laboral</h3>
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
                            <form id="form" action="{{ url('/personal/'. $id .'/estatus-laboral/guardar-estatus') }}" method="POST">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Estatus Laboral</label>
                                            <div class="form-control-wrap">
                                                <div class="form-control-select">
                                                    <select class="form-control" name="estatus_laboral" id="estatus_laboral">
                                                        <option value="default_option">Seleccione...</option>
                                                        <option value="Disponible"
                                                            @if (old('estatus_laboral') == 'Disponible') selected @endif>Disponible
                                                        </option>
                                                        <option value="Laborando"
                                                            @if (old('estatus_laboral') == 'Laborando') selected @endif>Laborando
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('estatus_laboral'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('estatus_laboral') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Disponibilidad</label>
                                            <div class="form-control-wrap">
                                                <div class="form-control-select">
                                                    <select class="form-control" name="disponibilidad" id="disponibilidad">
                                                        <option value="default_option">Seleccione...</option>
                                                        <option value="Mañana"
                                                            @if (old('disponibilidad') == 'Mañana') selected @endif>Mañana
                                                        </option>
                                                        <option value="Tarde"
                                                            @if (old('disponibilidad') == 'Tarde') selected @endif>Tarde
                                                        </option>
                                                        <option value="Noche"
                                                            @if (old('disponibilidad') == 'Noche') selected @endif>Noche
                                                        </option>
                                                        <option value="Madrugada"
                                                            @if (old('disponibilidad') == 'Madrugada') selected @endif>Madrugada
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('disponibilidad'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('disponibilidad') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Rango de Hora</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="rango_hora"
                                                    placeholder="Ejm: 8 a 10 am" value="{{ old('rango_hora') }}">
                                                @if ($errors->has('rango_hora'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('rango_hora') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Cantidad de Horas</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="cantidad_hora"
                                                    placeholder="Ejm: 8 Horas" value="{{ old('cantidad_hora') }}">
                                                @if ($errors->has('cantidad_hora'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('cantidad_hora') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Labor que Ejerce</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="nombre_labor"
                                                    placeholder="Ejm: Construccion">
                                                @if ($errors->has('nombre_labor'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('nombre_labor') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Técnica</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="tecnica"
                                                    placeholder="Ejm: Constructor" value="{{ old('tecnica') }}">
                                                @if ($errors->has('tecnica'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('tecnica') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Profesional</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="profesional"
                                                    placeholder="Ejm: Licenciado" value="{{ old('profesional') }}">
                                                @if ($errors->has('profesional'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('profesional') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Tiempo de Experiencia</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year"
                                                    name="tiempo_experiencia" placeholder="Ejm: 3 años"
                                                    value="{{ old('tiempo_experiencia') }}">
                                                @if ($errors->has('tiempo_experiencia'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('tiempo_experiencia') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Detalles de tu Profesión</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" name="detalle">{{ old('detalle') }}</textarea>
                                                @if ($errors->has('detalle'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('detalle') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-12">
                                        <h5>Trabajo Actual</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="empresa"
                                                    placeholder="Ejm: Comercial Rika C.A" value="{{ old('empresa') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Jefe Inmediato</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year"
                                                    name="jefe_inmediato" placeholder="Ejm: Carlos Doe"
                                                    value="{{ old('jefe_inmediato') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Teléfono</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="telefono"
                                                    placeholder="Ejm: 123456789" value="{{ old('telefono') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Años</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="anos"
                                                    placeholder="Ejm: 8 " value="{{ old('anos') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>Trabajo Anterior</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="empresa_old"
                                                    placeholder="Ejm: Comercial Rika C.A" value="{{ old('empresa_old') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Jefe Inmediato</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year"
                                                    name="jefe_inmediato_old" placeholder="Ejm: Carlos Doe"
                                                    value="{{ old('jefe_inmediato_old') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Teléfono</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year"
                                                    name="telefono_old" placeholder="Ejm: 123456789"
                                                    value="{{ old('telefono_old') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Años</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="year" name="anos_old"
                                                    placeholder="Ejm: 8 " value="{{ old('anos_old') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-gs mt-3">
                                    <div class="col-md-12 ">
                                        <div class="form-group float-right mt-3">
                                            <button id="guardar" class="btn btn-lg btn-primary">Guardar</button>
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
                $('#guardar').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>'
                    );
            });

        })(NioApp, jQuery);
    </script>
@endsection
