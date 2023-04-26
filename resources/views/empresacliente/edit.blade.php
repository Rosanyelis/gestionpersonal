@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Editar Empresa</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                                    class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('/empresas') }}" class="btn btn-secondary">
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
                        <form action="{{ url('empresas/'.$data->id.'/actualizar-empresa') }}" class="form-validate"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">Nombre de Empresa</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control " id="fw-vr-first-name" name="empresa"
                                                value="{{ $data->empresa }}"
                                                placeholder="Ejm: CITECSA">
                                            @if($errors->has('empresa'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('empresa') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">Actividad</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control " id="fw-vr-first-name"
                                                name="actividad" value="{{ $data->actividad }}"
                                                placeholder="Ejm: Empresa de Construcción">
                                            @if($errors->has('actividad'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('actividad') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-last-name">Teléfono Corporativo</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fw-vr-last-name" name="telefono_empresa"
                                                value="{{ $data->telefono_empresa }}"
                                                placeholder="Ejm: 123456789">
                                            @if($errors->has('telefono_empresa'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('telefono_empresa') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-last-name">Correo Corporativo</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fw-vr-last-name" name="correo_empresa"
                                                value="{{ $data->correo_empresa }}"
                                                placeholder="Ejm: empresa@example.com">
                                            @if($errors->has('correo_empresa'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('correo_empresa') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-last-name">Representate</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fw-vr-last-name"
                                                name="representante"
                                                value="{{ $data->representante }}"
                                                placeholder="Ejm: Doe Colin">
                                            @if($errors->has('representante'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('representante') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-last-name">Teléfono de
                                            Representante</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fw-vr-last-name"
                                                name="telefono_representante"
                                                value="{{ $data->telefono_representante }}"
                                                placeholder="Ejm: 123456789">
                                            @if($errors->has('telefono_representante'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('telefono_representante') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-last-name">Correo de Representante</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fw-vr-last-name"
                                                name="correo_representante"
                                                value="{{ $data->correo_representante }}"
                                                placeholder="Ejm: DoeColin@example.com">
                                            @if($errors->has('correo_representante'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('correo_representante') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">Provincia</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" name="provincia" id="provincia">
                                                    <option>Seleccione</option>
                                                    @foreach($provincias as $item)
                                                        <option value="{{ $item->id }}" @if ($item->nombre == $data->provincia) selected @endif >{{ $item->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->has('provincia'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('provincia') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">Municipio</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" name="municipio" id="municipio">
                                                    <option>{{ $data->municipio }}</option>
                                                </select>
                                            </div>
                                            @if($errors->has('municipio'))
                                                <span class="invalid text-danger">
                                                    {{ $errors->first('municipio') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-last-name">Sector</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fw-vr-last-name"
                                                name="sector" value="{{ $data->sector }}"
                                                placeholder="Ejm: Doe">
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
