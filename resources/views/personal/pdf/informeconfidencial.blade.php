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
            <tr class="indigo">
                <th colspan="3">Datos Confidenciales</th>
            </tr>
            <tr class="gray">
                <th colspan="3">Certificado de Integridad Laboral </th>
            </tr>
            <tr>
                <td colspan="2">Certificado de la Procuraduría</td>
                <td>
                    @if (isset($data->integridad_laboral->certificado_procuraduria))
                        {{ $data->integridad_laboral->certificado_procuraduria }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Resultado</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->integridad_laboral->resultadop))
                        {{ $data->integridad_laboral->resultadop }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalles</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->integridad_laboral->detallep))
                        {{ $data->integridad_laboral->detallep }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Certificado Institución del Orden</td>
                <td>
                    @if (isset($data->integridad_laboral->certificado_institucion))
                        {{ $data->integridad_laboral->certificado_institucion }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Resultado</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->integridad_laboral->resultadoi))
                        {{ $data->integridad_laboral->resultadoi }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalles</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->integridad_laboral->detallei))
                        {{ $data->integridad_laboral->detallei }}
                    @endif
                </td>
            </tr>
            <tr class="gray">
                <th colspan="3">Investigación y Depuración de Actividades Contrarias a las Leyes </th>
            </tr>
            <tr>
                <td colspan="2">Investigación profunda de vínculos con actividad antisocial</td>
                <td>
                    @if (isset($data->depuracion_leyes->actividad_antisocial))
                        {{ $data->depuracion_leyes->actividad_antisocial }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Resultado</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->depuracion_leyes->resultadop))
                        {{ $data->depuracion_leyes->resultadop }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalles</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->depuracion_leyes->detallep))
                        {{ $data->depuracion_leyes->detallep }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Reporte de actividades no procesada </td>
                <td>
                    @if (isset($data->depuracion_leyes->reporte_actividad_noprocesada))
                        {{ $data->depuracion_leyes->reporte_actividad_noprocesada }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Resultado</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->depuracion_leyes->resultadoi))
                        {{ $data->depuracion_leyes->resultadoi }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalles</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->depuracion_leyes->detallei))
                        {{ $data->depuracion_leyes->detallei }}
                    @endif
                </td>
            </tr>
            <tr class="gray">
                <th colspan="3">Analítica y Psicometría  </th>
            </tr>
            <tr>
                <td colspan="2">Prueba psicométrica</td>
                <td>
                    @if (isset($data->analisis_psicometria->prueba_psicometrica))
                        {{ $data->analisis_psicometria->prueba_psicometrica }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Resultado</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->resultadop))
                        {{ $data->analisis_psicometria->resultadop }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalles</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->detallep))
                        {{ $data->analisis_psicometria->detallep }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Prueba Enfermedades contagiosas </td>
                <td>
                    @if (isset($data->analisis_psicometria->enfermedades_contagiosas))
                        {{ $data->analisis_psicometria->enfermedades_contagiosas }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Resultado</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->resultadoi))
                        {{ $data->analisis_psicometria->resultadoi }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalles</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->detallei))
                        {{ $data->analisis_psicometria->detallei }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Prueba abuso consumo alcohol </td>
                <td>
                    @if (isset($data->analisis_psicometria->consumo_alcohol))
                        {{ $data->analisis_psicometria->consumo_alcohol }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Resultado</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->resultadoa))
                        {{ $data->analisis_psicometria->resultadoa }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalles</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->detallea))
                        {{ $data->analisis_psicometria->detallea }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Consumo de sustancia prohibida  </td>
                <td>
                    @if (isset($data->analisis_psicometria->sustancia_prohibida))
                        {{ $data->analisis_psicometria->sustancia_prohibida }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Resultado</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->resultados))
                        {{ $data->analisis_psicometria->resultados }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalles</th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->detalles))
                        {{ $data->analisis_psicometria->detalles }}
                    @endif
                </td>
            </tr>
            <tr class="gray">
                <th colspan="3">Levantamiento de Campo </th>
            </tr>
            <tr>
                <td colspan="2">Visita Domiciliaria</td>
                <td>
                    @if (isset($data->levantamiento_campo->visita_domiciliaria))
                        {{ $data->levantamiento_campo->visita_domiciliaria }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Levantamiento Coordenado   </td>
                <td>
                    @if (isset($data->levantamiento_campo->levantamiento_coordinado))
                        {{ $data->levantamiento_campo->levantamiento_coordinado }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Investigación de Entorno   </td>
                <td>
                    @if (isset($data->levantamiento_campo->investigacion_entorno))
                        {{ $data->levantamiento_campo->investigacion_entorno }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Levantamiento de Dactilares   </td>
                <td>
                    @if (isset($data->levantamiento_campo->levantamiento_dactilar))
                        {{ $data->levantamiento_campo->levantamiento_dactilar }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Levantamientos de Características Fotográfica </td>
                <td>
                    @if (isset($data->levantamiento_campo->levantamiento_fotografia))
                        {{ $data->levantamiento_campo->levantamiento_fotografia }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">Levantamiento de Integridad Familiar </td>
                <td>
                    @if (isset($data->levantamiento_campo->integridad_familiar))
                        {{ $data->levantamiento_campo->integridad_familiar }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="3">Detalle Levantamiento Campo </th>
            </tr>
            <tr>
                <td colspan="3">
                    @if (isset($data->analisis_psicometria->detalles))
                        {{ $data->analisis_psicometria->detalles }}
                    @endif
                </td>
            </tr>
        </table>
        {{-- Final seccion de datos Confidenciales --}}

        <div class="page-break"></div>

        {{-- Inicio seccion de datos de Actividades no Procesadas --}}
        <table class="table table-sm table-bordered">
            <tr class="indigo">
                <th colspan="4">Reporte de Actividades No Procesadas</th>
            </tr>
            @foreach ($data->actividad_noprocesada as $item)
            <tr >
                <th>Quien Reporta</th>
                <th>Fecha / Hora</th>
                <th>Provincia</th>
                <th>Municipio</th>
            </tr>
            <tr>
                <td></td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->provincia }}</td>
                <td>{{ $item->municipio }}</td>
            </tr>
            <tr>
                <th>Sector</th>
                <th>Tipo Reporte</th>
                <th colspan="2">Empresa</th>
            </tr>
            <tr>
                <td>{{ $item->sector }}</td>
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
        </table>
        {{-- Final seccion de datos Confidenciales --}}
    </main>
</body>

</html>
