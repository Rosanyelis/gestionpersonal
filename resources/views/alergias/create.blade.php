@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Crear Medicamentos</h3>
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
                        <form id="form" action="{{ url('/personal/'.$id.'/alergia-medicamentos/guardar-medicamento') }}" class="form-validate" method="POST">
                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="fw-vr-first-name">Medicamento</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control " id="medicamento" placeholder="Ejm: Anestesia">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button id="aggMedicamento" type="button" class="btn btn-md btn-success mt-4">Agregar</button>
                                </div>
                                <div class="col-md-12">
                                    <table id="Medicamentos" class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Medicamento</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="form-group float-right">
                                        <input type="hidden" id="datosMedicamentos" name="Arraymedicamentos">
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

            var datosMedicamentos = [];
            $('#aggMedicamento').click(function() {
                let medicamento = $('#medicamento').val();
                $("#Medicamentos tbody").append(
                    `<tr>
                        <td>`+medicamento+`</td>
                    </tr>`);

                let datosFila = {};
                datosFila.medicamento = medicamento;
                datosMedicamentos.push(datosFila);

                $('#medicamento').val('');
            });

            $('#guardar').click(function() {
                $('#datosMedicamentos').val(JSON.stringify(datosMedicamentos));
                $('#form').submit();
            });

        })(NioApp, jQuery);
    </script>
@endsection
