@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Crear Referencias Personales / Familiares</h3>
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
                            <form id="form" action="{{ url('/personal/' . $id . '/referencias/'.$data->id.'/actualizar-referencia') }}"
                                class="form-validate" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Nombre y
                                                Apellido</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " name="nombre"
                                                    value="{{ $data->nombre }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Cédula</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="ref-cedula" name="cedula"
                                                value="{{ $data->cedula }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Lugar de
                                                Nacimiento</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="ref-lugar"
                                                    name="lugar_nacimiento" value="{{ $data->lugar_nacimiento }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Teléfono</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="ref-telefono"
                                                    name="telefono" value="{{ $data->telefono }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Vínculo</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="ref-vinculo" name="vinculo"
                                                value="{{ $data->vinculo }}">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
                                            <input type="hidden" id="datosReferencia" name="ArrayReferencia">
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

