@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Nuevo Personal Externo</h3>
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
                            <form id="form" action="{{ url('/candidatos-externos/guardar-candidato-externo') }}" method="POST">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Cédula</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="fw-vr-first-name"
                                                    name="cedula" value="{{ old('cedula') }}" placeholder="Ejm: 123456789">
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
                                                    name="nombres" value="{{ old('nombres') }}"
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
                                                    name="apellidos" value="{{ old('apellidos') }}"
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
                                                    value="{{ old('fecha_nacimiento') }}">
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
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-lugar"
                                                    name="empresa" value="{{ old('empresa') }}"
                                                    placeholder="Ejm: El Caribe C.A">
                                                @if ($errors->has('empresa'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('empresa') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Sucursal</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-lugar"
                                                    name="sucursal" value="{{ old('sucursal') }}"
                                                    placeholder="Ejm: El Caribe 2 C.A">
                                                @if ($errors->has('sucursal'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('sucursal') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Autorizado</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-lugar"
                                                    name="autorizado" value="{{ old('autorizado') }}"
                                                    placeholder="Ejm: Carlos Pérez">
                                                @if ($errors->has('autorizado'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('autorizado') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Detalles</label>
                                            <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fw-vr-lugar"
                                                    name="detalle" value="{{ old('detalle') }}"
                                                    placeholder="Ejm: Lorem ipsum dolor sit amet">

                                                @if ($errors->has('detalle'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('detalle') }}
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
