@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Crear Enfermedades</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('/personal/' . $id . '/ver-perfil-de-personal') }}" class="btn btn-secondary">
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
                        <form id="form" action="{{ url('/personal/'.$id.'/enfermedades/guardar-enfermedad') }}" class="form-validate" method="POST">
                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="fw-vr-first-name">Enfermedad</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control " id="enfermedad" placeholder="Ejm: Diabetes">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button id="aggEnfermedades" type="button" class="btn btn-md btn-success mt-4">Agregar</button>
                                </div>
                                <div class="col-md-12">
                                    <table id="Enfermedades" class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Enfermedades</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="form-group float-right">
                                        <input type="hidden" id="datosEnfermedades" name="Arrayenfermedades">
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

            var datosEnfermedades = [];
            $('#aggEnfermedades').click(function() {
                let enfermedades = $('#enfermedad').val();
                $("#Enfermedades tbody").append(
                    `<tr>
                        <td>`+enfermedades+`</td>
                    </tr>`);

                let datosFila = {};
                datosFila.enfermedades = enfermedades;
                datosEnfermedades.push(datosFila);

                $('#enfermedad').val('');
            });

            $('#guardar').click(function() {
                $('#datosEnfermedades').val(JSON.stringify(datosEnfermedades));
                $('#form').submit();
            });

        })(NioApp, jQuery);
    </script>
@endsection
