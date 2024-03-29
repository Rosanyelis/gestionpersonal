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
                            <form id="form" action="{{ url('/personal/' . $id . '/referencias/guardar-referencia') }}"
                                class="form-validate" method="POST">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Nombre y
                                                Apellido</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="ref-nombre" name="padre"
                                                    placeholder="Ejm: Jena Andrea">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-last-name">Cédula</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="ref-cedula" name="estatus"
                                                    placeholder="Ejm: 000-0000000-0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Lugar de
                                                Nacimiento</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="ref-lugar"
                                                    name="lugar_nacimiento_padre" placeholder="Ejm: Cairo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Teléfono</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="ref-telefono"
                                                    name="telefonop" placeholder="Ejm: 000-000-0000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-apodo">Vínculo</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="ref-vinculo" name="vinculo"
                                                    placeholder="Ejm: Hermano">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button id="aggReferencia" type="button"
                                            class="btn btn-md btn-success mt-4">Agregar</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="Contacto" class="table mt-4 mb-5">
                                            <thead class="thead-light text-uppercase">
                                                <tr>
                                                    <th scope="col">Nombre y Apellido</th>
                                                    <th scope="col">Cédula</th>
                                                    <th scope="col">Lugar de Nacimiento</th>
                                                    <th scope="col">Teléfono</th>
                                                    <th scope="col">Vínculo</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
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

            var datosReferencias = [];
            $('#aggReferencia').click(function() {
                let nombre = $('#ref-nombre').val();
                let cedula = $('#ref-cedula').val();
                let lugar = $('#ref-lugar').val();
                let telefono = $('#ref-telefono').val();
                let vinculo = $('#ref-vinculo').val();
                $("#Contacto tbody").append(
                    `<tr>
                        <td>` + nombre + `</td>
                        <td>` + cedula + `</td>
                        <td>` + lugar + `</td>
                        <td>` + telefono + `</td>
                        <td>` + vinculo + `</td>
                    </tr>`);

                let datosFila = {};
                datosFila.nombre = nombre;
                datosFila.cedula = cedula;
                datosFila.lugar = lugar;
                datosFila.telefono = telefono;
                datosFila.vinculo = vinculo;
                datosReferencias.push(datosFila);

                $('#ref-nombre').val('');
                $('#ref-cedula').val('');
                $('#ref-lugar').val('');
                $('#ref-telefono').val('');
                $('#ref-vinculo').val('');
            });

            $('#guardar').click(function() {
                $('#datosReferencia').val(JSON.stringify(datosReferencias));
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>'
                    );
            });
        })(NioApp, jQuery);
    </script>
@endsection
