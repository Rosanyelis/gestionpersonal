@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Editar Personal</h3>
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
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <form id="form" action="{{ url('/personal/'.$data->id.'/actualizar-personal') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Cédula</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="fw-vr-first-name"
                                                    name="cedula" value="{{ $data->cedula }}" placeholder="Ejm: 123456789">
                                                @if ($errors->has('cedula'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('cedula') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Nombres</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="fw-vr-first-name"
                                                    name="nombres" value="{{ $data->nombres }}"
                                                    placeholder="Ejm: Jena Andrea">
                                                @if ($errors->has('nombres'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('nombres') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Apellidos</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="apellidos" value="{{ $data->apellidos }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('apellidos'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('apellidos') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Apodo</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-apodo" name="apodo"
                                                    value="{{ $data->apodo }}" placeholder="Ejm: Jena">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-mobile-number">Fecha
                                                Nacimiento</label>
                                            <div class="form-control-wrap">
                                                <input type="date" name="fecha_nacimiento" class="form-control"
                                                    value="{{ $data->fecha_nacimiento }}">
                                                @if ($errors->has('fecha_nacimiento'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('fecha_nacimiento') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Lugar de
                                                Nacimiento</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-lugar"
                                                    name="lugar_nacimiento" value="{{ $data->lugar_nacimiento }}"
                                                    placeholder="Ejm: Cairo">
                                                @if ($errors->has('lugar_nacimiento'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('lugar_nacimiento') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="estado_civil">Estado Civil</label>
                                            <div class="form-control-select">
                                                <select class="form-control" name="estado_civil" id="estado_civil">
                                                    <option value="default_option">Seleccione...</option>
                                                    <option value="Soltero(a)"
                                                        @if ($data->estado_civil == 'Soltero(a)') selected @endif>Soltero(a)
                                                    </option>
                                                    <option value="Casado(a)"
                                                        @if ($data->estado_civil == 'Casado(a)') selected @endif>Casado(a)
                                                    </option>
                                                    <option value="Viudo(a)"
                                                        @if ($data->estado_civil == 'Viudo(a)') selected @endif>Viudo(a)
                                                    </option>
                                                </select>
                                                @if ($errors->has('estado_civil'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('estado_civil') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="nacionalidad">Nacionalidad</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-lugar"
                                                    name="nacionalidad" value="{{ $data->nacionalidad }}"
                                                    placeholder="Ejm: Puertorriqueño">
                                                @if ($errors->has('nacionalidad'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('nacionalidad') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Tipo de
                                                Sangre</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-lugar"
                                                    name="tipo_sangre" value="{{ $data->tipo_sangre }}"
                                                    placeholder="Ejm: ORH+">
                                                @if ($errors->has('tipo_sangre'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('tipo_sangre') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row g-gs">
                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
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

            $('#guardar').click(function() {
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>'
                    );
            });
            @include('layouts.alerts')



        })(NioApp, jQuery);
    </script>
@endsection
