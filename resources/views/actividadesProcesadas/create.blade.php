@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Crear Reporte de Actividad No Procesada</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/personal/' . $id . '/actividades-no-procesadas/') }}"
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
                                action="{{ url('/personal/' . $id . '/actividades-no-procesadas/guardar-reporte') }}"
                                class="form-validate" method="POST">
                                @csrf
                                <div class="row g-gs">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Quien
                                                Reporta</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="quien_reporta">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Fecha</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control " id="fecha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Hora</label>
                                            <div class="form-control-wrap">
                                                <input type="time" class="form-control " id="hora">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">tipo de
                                                reporte</label>
                                            <div class="form-control-select">
                                                <select class="form-control" name="tipo" id="tipo">
                                                    <option value="default_option">Seleccione...</option>
                                                    <option value="Robo">Robo</option>
                                                    <option value="Intento Robo">Intento Robo</option>
                                                    <option value="Conflicto Social">Conflicto Social</option>
                                                    <option value="Accidente Laboral">Accidente Laboral</option>
                                                    <option value="Accidente de Transito">Accidente de Transito</option>
                                                    <option value="Asistencia bajo alcohol">Asistencia Bajo Alcohol</option>
                                                    <option value="Llegadas Tardías">Llegadas Tardías</option>
                                                    <option value="Pérdida de propiedades cargadas">Pérdida de Propiedades
                                                        Cargadas</option>
                                                    <option value="Robo de Propiedades Cargadas">Robo de Propiedades
                                                        Cargadas</option>
                                                    <option value="Conductor Reportado">Conductor Reportado</option>
                                                    <option value="Desvío de ruta">Desvío de ruta</option>
                                                    <option value="Víctima de Robo en Labores">Víctima de Robo en Labores
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-first-name">Tipo de
                                                Involucrado</label>
                                            <div class="form-control-select">
                                                <select class="form-control" name="tipo" id="tipoInv">
                                                    <option value="default_option">Seleccione...</option>
                                                    <option value="Victima">Victima</option>
                                                    <option value="Victimario">Victimario</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="empresa">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="empresa"
                                                    name="Empresa" value="{{ old('Empresa') }}"
                                                    placeholder="Ejm: Doe Colin">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-first-name">Provincia</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" name="provincia" id="provincia">
                                                        <option>Seleccione</option>
                                                        @foreach ($provincias as $item)
                                                            <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-first-name">Municipio</label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select class="form-control" name="municipio" id="municipio">
                                                        <option>Seleccione</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="sector">Sector</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="sector"
                                                    name="sector" value="{{ old('sector') }}"
                                                    placeholder="Ejm: Doe Colin">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase"
                                                for="fw-vr-first-name">detalles</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control " id="detalle"
                                                    placeholder="Ejm: Lorem ipsum dolor sit amet">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="aggContacto" type="button"
                                            class="btn btn-md btn-success mt-4">Agregar</button>
                                    </div>
                                    <div class="col-md-12 table-responsive">
                                        <table id="Contacto" class="table">
                                            <thead class="thead-light text-uppercase">
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Hora</th>
                                                    <th scope="col">Quien Reporta</th>
                                                    <th scope="col">Empresa</th>
                                                    <th scope="col">Provincia</th>
                                                    <th scope="col">Municipio</th>
                                                    <th scope="col">Sector</th>
                                                    <th scope="col">Involucrado</th>
                                                    <th scope="col">Tipo de Reporte</th>
                                                    <th scope="col">Detalle</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
                                            <input type="hidden" id="datosContacto" name="ArrayReporte">
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

            var datosContactos = [];

            $('#provincia').on('change', function() {
                let id = $(this).val();
                let url = '{{ url('') }}' +'/personal/'+id+'/get-nombre-municipios';
                console.log();
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        data.forEach(element => {
                            $('#municipio').append('<option value="'+element.nombre+'">'+element.nombre+'</option>');
                        });
                    }
                });
            });

            $('#aggContacto').click(function() {
                console.log($('#provincia').text());
                let fecha = $('#fecha').val();
                let hora = $('#hora').val();
                let quien_reporta = $('#quien_reporta').val();
                let tipoInv = $('#tipoInv').val();
                let empresa = $('#empresa').val();
                let provincia = $('#provincia').val();
                let municipio = $('#municipio').val();
                let sector = $('#sector').val();
                let tipo = $('#tipo').val();
                let detalle = $('#detalle').val();
                $("#Contacto tbody").append(
                    `<tr>
                        <td>` + fecha + `</td>
                        <td>` + hora + `</td>
                        <td>` + quien_reporta + `</td>
                        <td>` + tipoInv + `</td>
                        <td>` + empresa + `</td>
                        <td>` + provincia + `</td>
                        <td>` + municipio + `</td>
                        <td>` + sector + `</td>
                        <td>` + tipo + `</td>
                        <td class="text-ellipsis">` + detalle + `</td>
                    </tr>`);

                let datosFila = {};
                datosFila.fecha = fecha;
                datosFila.hora = hora;
                datosFila.quien_reporta = quien_reporta;
                datosFila.tipoInv = tipoInv;
                datosFila.empresa = empresa;
                datosFila.provincia = provincia;
                datosFila.municipio = municipio;
                datosFila.sector = sector;
                datosFila.tipo = tipo;
                datosFila.detalle = detalle;
                datosContactos.push(datosFila);

                $('#fecha').val('');
                $('#hora').val('');
                $('#quien_reporta').val('');
                $('#tipoInv').val('');
                $('#empresa').val('');
                $('#provincia').val('');
                $('#municipio').val('');
                $('#sector').val('');
                $('#tipo').val('');
                $('#detalle').val('');


            });

            $('#guardar').click(function() {
                $('#datosContacto').val(JSON.stringify(datosContactos));
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>'
                    );
            });

        })(NioApp, jQuery);
    </script>
@endsection
