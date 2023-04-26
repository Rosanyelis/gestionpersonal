@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Editar Carrera Universitaria</h3>
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
                            <form id="form" action="{{ url('/personal/' . $id . '/carreras-universitaria/' . $data->id . '/actualizar-carrera') }}"
                                class="form-validate" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-gs">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Institución</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="institucion" value="{{ $data->institucion }}">
                                                @if ($errors->has('institucion'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('institucion') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Titulo</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="titulo" value="{{ $data->titulo }}">
                                                @if ($errors->has('titulo'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('titulo') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Año</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fw-vr-last-name"
                                                    name="ano" value="{{ $data->ano }}">
                                                @if ($errors->has('ano'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('ano') }}
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
            $('#guardar').click(function() {
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>');
            });

        })(NioApp, jQuery);
    </script>
@endsection
