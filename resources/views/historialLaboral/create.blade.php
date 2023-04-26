@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Crear Historial Laboral</h3>
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
                            <form id="form"
                                action="{{ url('/personal/' . $id . '/experiencia-laboral/guardar-experiencia') }}"
                                class="form-validate" method="POST">
                                @csrf
                                <div class="row g-gs">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="empresa" name="empresa"
                                                    placeholder="Ejm: Universidad San Bernardo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Fecha de Entrada</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control " id="ano_entrada"
                                                    name="ano_entrada" placeholder="Ejm: 2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Fecha de Salida</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control " id="ano_salida"
                                                    name="ano_salida" placeholder="Ejm: 2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Labor Ejercida</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="labor" name="labor"
                                                    placeholder="Ejm: Plomero">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Cantidad de Años</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="cantidad_anos"
                                                    name="cantidad_anos" placeholder="Ejm: 2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Cantidad de Meses</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="cantidad_meses"
                                                    name="cantidad_meses" placeholder="Ejm: 20">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="aggHistorial" type="button"
                                            class="btn btn-md btn-success mt-4">Agregar</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="Historial" class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Empresa</th>
                                                    <th scope="col">Labor</th>
                                                    <th scope="col">Fecha Ent.</th>
                                                    <th scope="col">Fecha Sal.</th>
                                                    <th scope="col">Cant. Años</th>
                                                    <th scope="col">Cant. Meses</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
                                            <input type="hidden" id="datosHistorial" name="historialLaboral">
                                            <button type="button" id="guardar"
                                                class="btn btn-lg btn-primary">Guardar</button>
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
            var datosContactos = [];


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
                    $('#cantidad_anos').prop('disabled', true);
                }else{
                    $('#cantidad_anos').val(anio);
                }

            }


            $('#aggHistorial').click(function() {
                let empresa = $('#empresa').val();
                let labor = $('#labor').val();
                let cantidad_anos = $('#cantidad_anos').val();
                let cantidad_meses = $('#cantidad_meses').val();
                let anos_entrada = $('#ano_entrada').val();
                let anos_salida = $('#ano_salida').val();

                $("#Historial tbody").append(
                    `<tr>
                        <td>` + empresa + `</td>
                        <td>` + labor + `</td>
                        <td>` + anos_entrada + `</td>
                        <td>` + anos_salida + `</td>
                        <td>` + cantidad_anos + `</td>
                        <td>` + cantidad_meses + `</td>
                    </tr>`);

                let datosFila = {};
                datosFila.empresa = empresa;
                datosFila.labor = labor;
                datosFila.anos_entrada = anos_entrada;
                datosFila.anos_salida = anos_salida;
                datosFila.cantidad_anos = cantidad_anos;
                datosFila.cantidad_meses = cantidad_meses;
                datosContactos.push(datosFila);

                $('#empresa').val('');
                $('#labor').val('');
                $('#cantidad_anos').val('');
                $('#cantidad_meses').val('');
                $('#ano_entrada').val('');
                $('#ano_salida').val('');

            });

            $('#guardar').click(function() {
                $('#datosHistorial').val(JSON.stringify(datosContactos));
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>'
                    );
            });

        })(NioApp, jQuery);
    </script>
@endsection
