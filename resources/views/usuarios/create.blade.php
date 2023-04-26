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
                            <form action="{{ url('configuraciones/usuarios/guardar-usuario') }}" class="form-validate"
                                method="POST">
                                @csrf
                                <div class="row g-gs">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label  text-uppercase">tipo de usuario</label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="tipoE" name="tipo"
                                                    class="custom-control-input" value="Empresa">
                                                <label class="custom-control-label" for="tipoE">Empresa Cliente</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="tipoEC" name="tipo"
                                                    class="custom-control-input" value="Empleado">
                                                <label class="custom-control-label" for="tipoEC">Empleado Citecsa</label>
                                            </div>
                                        </div>
                                        @if ($errors->has('tipo'))
                                            <span class="invalid text-danger">
                                                {{ $errors->first('tipo') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div id="empleado" class="row g-gs">
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
                                <div id="empresa" class="row g-gs">
                                    <div class="col-md-12 badge badge-dark p-1">
                                        <h6 class="title text-white text-uppercase">Datos de Empresa</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-first-name">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-first-name"
                                                    name="empresa" value="{{ old('empresa') }}"
                                                    placeholder="Ejm: Comercial Rika C.A">
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
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-last-name">Actividad</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="actividad" value="{{ old('actividad') }}"
                                                    placeholder="Ejm: Compra de viveres">
                                                @if ($errors->has('actividad'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('actividad') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Teléfono de
                                                Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="telefono_empresa" value="{{ old('telefono_empresa') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('telefono_empresa'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('telefono_empresa') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Correo
                                                Corporativo</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="correo_empresa" value="{{ old('correo_empresa') }}"
                                                    placeholder="Ejm: comercialrika@example.com">
                                                @if ($errors->has('correo_empresa'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('correo_empresa') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-last-name">Representante</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="representante" value="{{ old('representante') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('representante'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('representante') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Teléfono
                                                Representante</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="telefono_representante"
                                                    value="{{ old('telefono_representante') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('telefono_representante'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('telefono_representante') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Correo de
                                                Representante</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="correo_representante" value="{{ old('correo_representante') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('correo_representante'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('correo_representante') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-first-name">Provincia</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" name="provincia" id="provincia">
                                                        <option>Seleccione</option>
                                                        @foreach ($provincias as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('provincia'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('provincia') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-first-name">Municipio</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" name="municipio" id="municipio">
                                                        <option>Seleccione</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('municipio'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('municipio') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Sector</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="sector" value="{{ old('sector') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('sector'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('sector') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Calle</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="calle" value="{{ old('calle') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('calle'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('calle') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Número</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="numero" value="{{ old('numero') }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('numero'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('numero') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Referencia de
                                                Llegada</label>
                                            <div class="form-control-wrap">
                                                <textarea type="text" class="form-control" name="referencia" id="" cols="10">{{ old('referencia') }}</textarea>
                                                @if ($errors->has('referencia'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('referencia') }}
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
                                                        <option value="{{ $item->name }}"
                                                            @if ($item->name == old('rol')) selected @endif>
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
                                            <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
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

            $('#empresa').hide();
            $('#empleado').hide();

            @include('layouts.alerts')

            $('#tipoE').click(function() {
                if ($(this).is(':checked')) {
                    $('#empresa').show();
                    $('#empleado').hide();
                }
            });
            $('#tipoEC').click(function() {
                if ($(this).is(':checked')) {
                    $('#empleado').show();
                    $('#empresa').hide();
                }
            });

            $('#provincia').on('change', function() {
                let id = $(this).val();
                let url = '{{ url('') }}' + '/personal/' + id + '/get-municipios';
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data.forEach(element => {
                            $('#municipio').append('<option value="' + element.nombre +
                                '">' + element.nombre + '</option>');
                        });
                    }
                });
            });

            $('input[type=password]').keyup(function() {
                // set password variable
                var pswd = $(this).val();
                //validate the length
                if (pswd.length < 8) {
                    $('#length').removeClass('valid').addClass('invalid');
                } else {
                    $('#length').removeClass('invalid').addClass('valid');
                }

                //validate letter
                if (pswd.match(/[A-z]/)) {
                    $('#letter').removeClass('invalid').addClass('valid');
                } else {
                    $('#letter').removeClass('valid').addClass('invalid');
                }

                //validate capital letter
                if (pswd.match(/[A-Z]/)) {
                    $('#capital').removeClass('invalid').addClass('valid');
                } else {
                    $('#capital').removeClass('valid').addClass('invalid');
                }

                //validate number
                if (pswd.match(/\d/)) {
                    $('#number').removeClass('invalid').addClass('valid');
                } else {
                    $('#number').removeClass('valid').addClass('invalid');
                }

            }).focus(function() {
                $('#pswd_info').show();
            }).blur(function() {
                $('#pswd_info').hide();
            });

        })(NioApp, jQuery);
    </script>
@endsection
