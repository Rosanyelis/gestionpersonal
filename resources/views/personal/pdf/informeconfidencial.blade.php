<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <title>CITECSA - Informe Confidencial - {{ $data->nombres }} {{ $data->apellidos }}</title>
    <style>
        @page {
            margin: 0cm;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        body {
            margin: 1cm;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 0.85rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
        }
        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            /* border-top: 1px solid #dee2e6; */
        }

        .table thead th {
            vertical-align: bottom;
            /* border-bottom: 2px solid #dee2e6; */
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.2rem;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-borderless th,
        .table-borderless td,
        .table-borderless thead th,
        .table-borderless tbody+tbody {
            border: 0;
        }
        .indigo{
            background-color: #6f42c1;;
            color: #ffffff;
        }
        .gray{
            background-color: #6c757d;
            color: #ffffff;
        }
        .gray-dark{
            background-color: #343a40;
            color: #ffffff;
        }
        .page-break{
            page-break-after: always;
        }
    </style>
</head>

<body>
    <main>
        <table class="table-bordered">
            <tr>
                <th width="150">
                    <img src="./images/CITECSA LOGO.png" alt="logo CITECSA" width="60%">
                </th>
                <th width="378">
                    <h1>Centro de Investigación Tecnológicas <br> y Seguridad Avanzada</h1>
                    <h2>Informe Confidencial</h2>
                </th>
            </tr>
        </table>

        <table class="table table-sm table-bordered">
            <tr class="indigo">
                <th colspan="3">Datos Personales</th>
            </tr>
            <tr >
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Apodo</th>
            </tr>
            <tr>
                <td>{{ $data->nombres }}</td>
                <td>{{ $data->apellidos }}</td>
                <td>{{ $data->apodo }}</td>
            </tr>
            <tr>
                <th>Cédula</th>
                <th>Fecha Nacimiento</th>
                <th>Edad</th>
            </tr>
            <tr>
                <td>{{ $data->cedula }}</td>
                <td>{{ $data->fecha_nacimiento }}</td>
                <td>{{ \Carbon\Carbon::createFromDate($data->fecha_nacimiento)->age }}</td>
            </tr>
            <tr>
                <th>Lugar de Nacimiento</th>
                <th>Nacionalidad</th>
                <th>Estado Civil</th>
            </tr>
            <tr>
                <td>{{ $data->lugar_nacimiento }}</td>
                <td>{{ $data->nacionalidad }}</td>
                <td>{{ $data->estado_civil }}</td>
            </tr>
        </table>

        {{-- Inicio seccion de datos Confidenciales --}}
        <table class="table table-sm table-bordered">
            <thead>
                <tr class="indigo">
                    <th colspan="4">Pruebas de Integridad Laboral</th>
                </tr>
            </thead>
        </table>
        @foreach ($data->integridad_laboral as $item)
        <table class="table table-sm table-bordered">
            <thead>
                <tr class="text-uppercase">
                    <th scope="col" colspan="2">Fecha y Hora de la Prueba: {!! \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i:s A') !!}</th>
                    <th scope="col" colspan="2">Respuesta</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Tipo de Prueba</th>
                    <th>SI</th>
                    <th>NO</th>
                </tr>
            </thead>
            <tbody class="text-uppercase">
                <tr>
                    <th colspan="4" class="text-center">Certificado de integridad laboral y
                        depuraciones</th>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Certificado de la Procuraduría <br></td>
                    <td>
                        @if ($item->certificado_procuraduria == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                    </td>
                    <td>
                        @if ($item->certificado_procuraduria == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif

                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Certificado Institución del Orden </td>
                    <td>
                        @if (isset($item->certificado_institucion))
                            @if ($item->certificado_institucion == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif

                    </td>
                    <td>
                        @if (isset($item->certificado_institucion))
                            @if ($item->certificado_institucion == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Investigación y depuración de
                        actividades contrarias a las leyes</th>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Investigación profunda de vínculos con actividad antisocial</td>
                    <td>
                        @if (isset($item->actividad_antisocial))
                            @if ($item->actividad_antisocial == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->actividad_antisocial))
                            @if ($item->actividad_antisocial == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Reporte de actividades no procesada</td>
                    <td>
                        @if (isset($item->reporte_actividad_noprocesada))
                            @if ($item->reporte_actividad_noprocesada == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->reporte_actividad_noprocesada))
                            @if ($item->reporte_actividad_noprocesada == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Analística y psicometría</th>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Prueba Poligráfica</td>
                    <td>
                        @if (isset($item->prueba_poligrafica))
                            @if ($item->prueba_poligrafica == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->prueba_poligrafica))
                            @if ($item->prueba_poligrafica == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Prueba Psicométrica</td>
                    <td>
                        @if (isset($item->prueba_psicometrica))
                            @if ($item->prueba_psicometrica == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->prueba_psicometrica))
                            @if ($item->prueba_psicometrica == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Prueba Enfermedades contagiosas</td>
                    <td>
                        @if (isset($item->enfermedades_contagiosas))
                            @if ($item->enfermedades_contagiosas == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->enfermedades_contagiosas))
                            @if ($item->enfermedades_contagiosas == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Prueba abuso consumo alcohol</td>
                    <td>
                        @if (isset($item->consumo_alcohol))
                            @if ($item->consumo_alcohol == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->consumo_alcohol))
                            @if ($item->consumo_alcohol == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Consumo de sustancia prohibida</td>
                    <td>
                        @if (isset($item->sustancia_prohibida))
                            @if ($item->sustancia_prohibida == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->sustancia_prohibida))
                            @if ($item->sustancia_prohibida == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Levantamiento de campo</th>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Visita Domiciliaria</td>
                    <td>
                        @if (isset($item->visita_domiciliaria))
                            @if ($item->visita_domiciliaria == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->visita_domiciliaria))
                            @if ($item->visita_domiciliaria == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td>Levantamiento coordenado</td>
                    <td>
                        @if (isset($item->levantamiento_coordinado))
                            @if ($item->levantamiento_coordinado == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->levantamiento_coordinado))
                            @if ($item->levantamiento_coordinado == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">12</th>
                    <td>Investigación de entorno</td>
                    <td>
                        @if (isset($item->investigacion_entorno))
                            @if ($item->investigacion_entorno == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->investigacion_entorno))
                            @if ($item->investigacion_entorno == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">13</th>
                    <td>Levantamiento de Dactilares</td>
                    <td>
                        @if (isset($item->levantamiento_dactilar))
                            @if ($item->levantamiento_dactilar == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->levantamiento_dactilar))
                            @if ($item->levantamiento_dactilar == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">14</th>
                    <td>Levantamientos de características fotográfica</td>
                    <td>
                        @if (isset($item->levantamiento_fotografia))
                            @if ($item->levantamiento_fotografia == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->levantamiento_fotografia))
                            @if ($item->levantamiento_fotografia == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">15</th>
                    <td>Levantamiento de integridad familiar</td>
                    <td>
                        @if (isset($item->integridad_familiar))
                            @if ($item->integridad_familiar == 'Si')
                                <label class="form-label text-uppercase">Si</label>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if (isset($item->integridad_familiar))
                            @if ($item->integridad_familiar == 'No')
                                <label class="form-label text-uppercase">No</label>
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Resultado</th>
                </tr>
                <tr>
                    <td colspan="4">
                        <p class="text-lowercase">
                            @if (isset($item->resultado))
                            {{ $item->resultado }}
                            @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Detalles</th>
                </tr>
                <tr>
                    <td colspan="4">
                        <p class="text-lowercase">
                            @if (isset($item->detalle))
                            {{ $item->detalle }}
                            @endif
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        @if (!$loop->last)
        <div class="page-break"></div>
        @endif
        @endforeach
        {{-- Final seccion de datos Confidenciales --}}

        <div class="page-break"></div>

        {{-- Inicio seccion de datos de Actividades no Procesadas --}}
        <table class="table table-sm table-bordered">
            <tr class="indigo">
                <th colspan="4">Reporte de Actividades No Procesadas</th>
            </tr>
            @if (isset($data->actividad_noprocesada))
            @foreach ($data->actividad_noprocesada as $item)
                <tr>
                    <th>Quien Reporta</th>
                    <th>Fecha / Hora</th>
                    <th>Provincia</th>
                    <th>Municipio</th>
                </tr>
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{!! \Carbon\Carbon::parse($data->created_at)->format('d-m-Y h:i:s A') !!}</td>
                    <td>{{ $item->user->provincia }}</td>
                    <td>{{ $item->user->municipio }}</td>
                </tr>
                <tr>
                    <th>Sector</th>
                    <th>Tipo Reporte</th>
                    <th colspan="2">Empresa</th>
                </tr>
                <tr>
                    <td>{{ $item->user->sector }}</td>
                    <td>{{ $item->tipo_reporte }}</td>
                    <td colspan="2">{{ $item->empresa }}</td>
                </tr>
                <tr>
                    <th colspan="4">Detalles del Reporte</th>
                </tr>
                <tr>
                    <td colspan="4">{{ $item->detalles }}</td>
                </tr>
            @endforeach
            @endif
        </table>
        {{-- Final seccion de datos Confidenciales --}}
    </main>
</body>

</html>
