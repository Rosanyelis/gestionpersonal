@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Editar Experiencia Laboral</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/personal/' . $id . '/actividades-laboral') }}"
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
                            <form id="form" action="{{ url('/personal/' . $id . '/experiencia-laboral/' . $data->id . '/actualizar-experiencia') }}"
                                class="form-validate" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-gs">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="empresa" value="{{ $data->empresa }}">
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
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Labor</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="labor" value="{{ $data->labor }}">
                                                @if ($errors->has('labor'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('labor') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Fecha de Entrada</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control" id="ano_entrada"
                                                    name="ano_entrada" value="{{ $data->ano_entrada }}">
                                                @if ($errors->has('ano_entrada'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('ano_entrada') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Fecha de Salida</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control" id="ano_salida"
                                                    name="ano_salida" value="{{ $data->ano_salida }}">
                                                @if ($errors->has('ano_salida'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('ano_salida') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Cantidad de Años</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="cantidad_anos"
                                                    name="cantidad_ano" value="{{ $data->cantidad_ano }}">
                                                @if ($errors->has('cantidad_ano'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('cantidad_ano') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Cantidad de Meses</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="cantidad_meses" value="{{ $data->cantidad_meses }}">
                                                @if ($errors->has('cantidad_meses'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('cantidad_meses') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
                                            <button id="guardar" type="button" class="btn btn-lg btn-primary">Guardar</button>
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

            $('#ano_salida').change(calcularAnios);

            function calcularAnios() {

                let fechaE = new Date($('#ano_entrada').val());
                let fechaS = new Date($('#ano_salida').val());
                let yearE = fechaE.getFullYear();
                let yearS = fechaS.getFullYear();

                let anio = fechaS.getFullYear() - fechaE.getFullYear();
                let m = fechaS.getMonth() - fechaE.getMonth();

                if (m < 0 || (m === 0 && fechaS.getDate() < fechaE.getDate())) {
                    anio--;
                }
                if (anio <= 0) {
                    $('#cantidad_anos').val('');
                    $('#cantidad_anos').prop('disabled', true);
                }else{
                    $('#cantidad_anos').val(anio);
                }

            }
            $('#guardar').click(function() {
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>');
            });

        })(NioApp, jQuery);
    </script>
@endsection
