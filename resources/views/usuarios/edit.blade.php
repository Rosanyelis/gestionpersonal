@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Actualizar Usuario</h3>
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
                            <form action="{{ url('configuraciones/usuarios/' . $data->id . '/actualizar-usuario') }}"
                                class="form-validate" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @if ($data->tipo == 'Empleado')
                                <div id="empleado" class="row g-gs">
                                    <div class="col-md-12 badge badge-dark p-1">
                                        <h6 class="title text-white text-uppercase">Datos de Empleado</h6>
                                    </div>
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
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Nombre</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="fw-vr-first-name"
                                                    name="nombre" value="{{ $data->nombre }}"
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
                                                    name="apellido" value="{{ $data->apellido }}"
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
                                                    name="telefono" value="{{ $data->telefono }}"
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
                                                    name="flota" value="{{ $data->flota }}"
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
                                                    name="cargo" value="{{ $data->cargo }}"
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
                                                    name="correo_personal" value="{{ $data->correo_personal }}"
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
                                @endif
                                @if ($data->tipo == 'Empresa')
                                <div id="empresa" class="row g-gs">
                                    <div class="col-md-12 badge badge-dark p-1">
                                        <h6 class="title text-white text-uppercase">Datos de Empresa</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-first-name">Logo Empresa</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input name="logo" type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Subir Logo</label>
                                                    @if ($errors->has('logo'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('logo') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset(''.$data->logo.'') }}" class="card-img-top" alt="{{ $data->empresa }}">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-first-name">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-first-name"
                                                    name="empresa" value="{{ $data->empresa }}"
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
                                                    name="actividad" value="{{ $data->actividad }}"
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
                                                    name="telefono_empresa" value="{{ $data->telefono_empresa }}"
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
                                                    name="correo_empresa" value="{{ $data->correo_empresa }}"
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
                                                    name="representante" value="{{ $data->representante }}"
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
                                                    value="{{ $data->telefono_representante }}"
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
                                                    name="correo_representante" value="{{ $data->correo_representante }}"
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
                                                            <option value="{{ $item->id }}"  @if ($item->nombre == $data->provincia) selected @endif>{{ $item->nombre }}
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
                                                        <option>{{ $data->municipio }}</option>
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
                                                    name="sector" value="{{ $data->sector }}"
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
                                                    name="calle" value="{{ $data->calle }}"
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
                                                    name="numero" value="{{ $data->numero }}"
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
                                                <textarea type="text" class="form-control" name="referencia" id="" cols="10">{{ $data->referencia }}</textarea>
                                                @if ($errors->has('referencia'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('referencia') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row g-gs">
                                    <div class="col-md-12 badge badge-dark mt-3">
                                        <h6 class="title text-white text-uppercase">Datos de Usuario</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="usuario">Nombre de Usuario</label>
                                            <div class="form-control-wrap">
                                                <input type="text"
                                                    class="form-control @error('name') invalid @enderror" id="usuario"
                                                    name="name" value="{{ $data->name }}"
                                                    placeholder="Ejm: Carlos Doe">
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
                                                    name="email" value="{{ $data->email }}"
                                                    placeholder="Ejm: example@example.com">
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
                                                    id="password" name="password" placeholder="Ejm: ********">
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
                                                        @foreach ($data->roles as $rol)
                                                            <option value="{{ $item->name }}"
                                                                @if ($item->name == $rol->name) selected @endif>
                                                                {{ $item->name }}</option>
                                                        @endforeach
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
                                            <input type="hidden" name="tipo" value="{{ $data->tipo }}">
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

            @include('layouts.alerts')


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


        })(NioApp, jQuery);
    </script>
@endsection
