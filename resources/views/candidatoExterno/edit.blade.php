@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Editar Personal Externo</h3>
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
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <form id="form"
                                action="{{ url('/candidatos-externos/' . $data->id . '/actualizar-candidato-externo') }}"
                                method="POST" enctype="multipart/form-data">
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
                                                <input type="text" class="form-control text-capitalize" id="fw-vr-first-name"
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
                                                <input type="text" class="form-control text-capitalize" id="fw-vr-last-name"
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
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Cédula Anterior</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="fw-cedula-old"
                                                    name="cedula_anterior" value="{{ $data->cedula_anterior }}" placeholder="Ejm: 123456789">
                                                @if ($errors->has('cedula_anterior'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('cedula_anterior') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Pasaporte</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="fw-pasaporte"
                                                    name="pasaporte" value="{{ $data->pasaporte }}" placeholder="Ejm: 123456789">
                                                @if ($errors->has('pasaporte'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('pasaporte') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Lugar Nacimiento</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control text-capitalize" id="fw-lugar-nacimiento"
                                                    name="lugar_nacimiento" value="{{ $data->lugar_nacimiento }}" placeholder="Ejm: 123456789">
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
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Teléfono</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="fw-telefono"
                                                    name="telefono" value="{{ $data->telefono }}" placeholder="Ejm: 123456789">
                                                @if ($errors->has('telefono'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('telefono') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Foto</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input name="foto" type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Subir Foto</label>
                                                    @if ($errors->has('foto'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('foto') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-avatar sq xl mt-2">
                                            <img src="{{ asset(''.$data->foto.'') }}" alt="{{ $data->nombres }} {{ $data->apellidos }}">
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
