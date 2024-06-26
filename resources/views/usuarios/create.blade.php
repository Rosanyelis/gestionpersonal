@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Crear Usuario</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/configuraciones/usuarios') }}" class="btn btn-secondary">
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
                            <form id="form" action="{{ url('configuraciones/usuarios/guardar-usuario') }}" class="form-validate"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-gs">
                                    <div class="col-md-12 badge badge-dark p-1">
                                        <h6 class="title text-white text-uppercase">Datos de Empleado</h6>
                                    </div>
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
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Nombre</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="fw-vr-first-name"
                                                    name="nombre" value="{{ old('nombre') }}"
                                                    placeholder="Ejm: Jena Andrea">
                                                @if ($errors->has('nombre'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('nombre') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Apellido</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="apellido" value="{{ old('apellido') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('apellido'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('apellido') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Teléfono</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="telefono" value="{{ old('telefono') }}"
                                                    placeholder="Ejm: Doe Colin">
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
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Flota</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="flota" value="{{ old('flota') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('flota'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('flota') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Cargo</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="cargo" value="{{ old('cargo') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('cargo'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('cargo') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Correo
                                                Personal</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="correo_personal" value="{{ old('correo_personal') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('correo_personal'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('correo_personal') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-gs ">
                                    <div class="col-md-12 badge badge-dark mt-3">
                                        <h6 class="title text-white text-uppercase">Datos de Usuario</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="usuario">Nombre de
                                                Usuario</label>
                                            <div class="form-control-wrap">
                                                <input type="text"
                                                    class="form-control @error('password') invalid @enderror"
                                                    id="usuario" name="name" value="{{ old('name') }}"
                                                    placeholder="Ejm: Artículos Personales">
                                                @if ($errors->has('name'))
                                                    <span id="fv-full-name-error" class="invalid">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="email">Correo</label>
                                            <div class="form-control-wrap">
                                                <input type="text"
                                                    class="form-control @error('email') invalid @enderror" id="email"
                                                    name="email" value="{{ old('email') }}"
                                                    placeholder="Ejm: Artículos Personales">
                                                @if ($errors->has('email'))
                                                    <span id="fv-full-name-error" class="invalid">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="password">Contraseña</label>
                                            <div class="form-control-wrap">
                                                <input type="password"
                                                    class="form-control @error('password') invalid @enderror"
                                                    id="password" name="password" value="{{ old('password') }}"
                                                    placeholder="Ejm: Artículos Personales">
                                                @if ($errors->has('password'))
                                                    <span id="fv-full-name-error" class="invalid">
                                                        {{ $errors->first('password') }}
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="usuario">Rol</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control form-select @error('rol') error @enderror"
                                                    name="rol" data-placeholder="Seleccione una opción">
                                                    <option label="empty" value=""></option>
                                                    @foreach ($roles as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == old('rol')) selected @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('rol'))
                                                    <span id="fv-full-name-error" class="invalid">
                                                        {{ $errors->first('rol') }}
                                                    </span>
                                                @endif
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

            @include('layouts.alerts')

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
