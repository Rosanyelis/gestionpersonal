@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Crear Contactos de Emergencia</h3>
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
                        <form id="form" action="{{ url('/personal/'.$id.'/contactos-de-emergencia/guardar-contacto') }}" class="form-validate" method="POST">
                            @csrf
                            <div class="row g-gs">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">Nombre y Apellido</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control " id="nombre" placeholder="Ejm: Carlos Doe">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label text-uppercase" for="fw-vr-first-name">Teléfono</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control " id="telefono" placeholder="Ejm: 123456789">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button id="aggContacto" type="button" class="btn btn-md btn-success mt-4">Agregar</button>
                                </div>
                                <div class="col-md-12">
                                    <table id="Contacto" class="table">
                                        <thead class="thead-light text-uppercase">
                                            <tr>
                                                <th scope="col">Nombre y Apellido</th>
                                                <th scope="col">Teléfono</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="form-group float-right">
                                        <input type="hidden" id="datosContacto" name="ArrayContacto">
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

            var datosContactos = [];
            $('#aggContacto').click(function() {
                let nombre = $('#nombre').val();
                let telefono = $('#telefono').val();
                $("#Contacto tbody").append(
                    `<tr>
                        <td>`+nombre+`</td>
                        <td>`+telefono+`</td>
                    </tr>`);

                let datosFila = {};
                datosFila.nombre = nombre;
                datosFila.telefono = telefono;
                datosContactos.push(datosFila);


                $('#nombre').val('');
                $('#telefono').val('');
            });

            $('#guardar').click(function() {
                $('#datosContacto').val(JSON.stringify(datosContactos));
                $('#form').submit();
            });

        })(NioApp, jQuery);
    </script>
@endsection
