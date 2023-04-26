@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Editar Datos de Residencia</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/personal/' . $id . '/ver-perfil-de-personal') }}"
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
                            <form action="{{ url('/personal/' . $id . '/residencia/' . $data->id . '/actualizar-residencia') }}"
                                class="form-validate" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-gs">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fw-vr-first-name">Provincia</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" name="provincia" id="provincia">
                                                        <option>Seleccione</option>
                                                        @foreach ($provincias as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($item->nombre == $data->provincia) selected @endif>
                                                                {{ $item->nombre }}
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
                                            <label class="form-label" for="fw-vr-first-name">Municipio</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" name="municipio" id="municipio">
                                                        <option value="{{ $data->municipio }}">{{ $data->municipio }}</option>
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
                                            <label class="form-label" for="fw-vr-last-name">Distrito Municipal</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="distrito_municipal" value="{{ $data->distrito_municipal }}">
                                                @if ($errors->has('distrito_municipal'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('distrito_municipal') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fw-vr-last-name">Seccion</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="seccion" value="{{ $data->seccion }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('seccion'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('seccion') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fw-vr-last-name">Barrio</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="barrio" value="{{ $data->barrio }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('barrio'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('barrio') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fw-vr-apodo">Tipo de Residencia</label>
                                            <div class="form-control-wrap">
                                                <input class="form-control" name="tipo_residencia" id="tipo_residencia"
                                                    value="{{ $data->tipo_residencia }}" placeholder="Ejm: Apartamento">
                                                @if ($errors->has('tipo_residencia'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('tipo_residencia') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fw-vr-apodo">Calle</label>
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
                                            <label class="form-label" for="fw-vr-apodo">Número</label>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fw-vr-apodo">Coordenadas</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="coordenada" value="{{ $data->coordenada }}"
                                                    placeholder="Ejm: Doe Colin">
                                                @if ($errors->has('coordenada'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('coordenada') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fw-vr-apodo">Referencia de
                                                Llegada</label>
                                            <div class="form-control-wrap">
                                                <textarea type="text" class="form-control" name="referencia_llegada"
                                                id="" cols="10">{{ $data->referencia_llegada }}</textarea>
                                                @if ($errors->has('referencia_llegada'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('referencia_llegada') }}
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
