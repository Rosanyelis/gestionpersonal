<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <title>CITECSA - Perfil Curricular - {{ $data->nombres }} {{ $data->apellidos }}</title>
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
                    <h2>Perfil Curricular</h2>
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

        <table class="table table-sm table-bordered">
            <tr class="indigo">
                <th colspan="3">Datos de Residencia</th>
            </tr>
            <tr >
                <th>Provincia</th>
                <th>Municipio</th>
                <th>Sector</th>
            </tr>
            <tr>
                <td>{{ $data->residencia->provincia }}</td>
                <td>{{ $data->residencia->municipio }}</td>
                <td>{{ $data->residencia->sector }}</td>
            </tr>
            <tr >
                <th>Tipo de Residencia</th>
                <th>Calle</th>
                <th>Número</th>
            </tr>
            <tr>
                <td>{{ $data->residencia->tipo_residencia }}</td>
                <td>{{ $data->residencia->calle }}</td>
                <td>{{ $data->residencia->numero }}</td>
            </tr>
            <tr >
                <th colspan="3">Referencia de Llegada</th>
            </tr>
            <tr>
                <td colspan="3">{{ $data->residencia->referencia_llegada }}</td>
            </tr>
        </table>

        <table class="table table-sm table-bordered">
            <tr class="indigo">
                <th colspan="5">Datos de Referencias Personales / Familiares</th>
            </tr>
            <tr>
                <th>Nombres y Apellidos</th>
                <th>Cédula</th>
                <th>Lugar Nac.</th>
                <th>Teléfono</th>
                <th>Vínculo</th>
            </tr>
            @foreach ($data->referenciaspersonales as $item)
                <tr>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->cedula }}</td>
                    <td>{{ $item->lugar_nacimiento }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->vinculo }}</td>
                </tr>
            @endforeach
        </table>
        {{-- Final seccion de datos personales --}}
        <div class="page-break"></div>

        {{-- Inicio seccion de datos de seguridad personal en la vía  --}}
        <table class="table table-sm table-bordered">
            <tr class="indigo">
                <th colspan="2">Datos de Seguridad Personal en la Vía </th>
            </tr>
            <tr class="gray">
                <th colspan="2">Tipo de Sangre</th>
            </tr>
            <tr>
                <td colspan="2">{{ $data->tipo_sangre }}</td>
            </tr>
            <tr class="gray">
                <th colspan="2">Médicamentos a los que es Alérgico</th>
            </tr>
            <tr>
                <td colspan="2">
                    @foreach ($data->alergia_medicamentos as $item)
                        {{ $item->nombre }},
                    @endforeach
                </td>
            </tr>
            <tr class="gray">
                <th colspan="2">Enfermedades que padece</th>
            </tr>
            <tr>
                <td colspan="2">
                    @foreach ($data->enfermedades as $item)
                        {{ $item->nombre }},
                    @endforeach
                </td>
            </tr>
            <tr class="gray">
                <th colspan="2">Contactos de Emergencia</th>
            </tr>
            <tr >
                <th>Nombre</th>
                <th>Teléfono</th>
            </tr>
            @foreach ($data->contactos_emergencia as $item)
            <tr>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->telefono }}</td>
            </tr>
            @endforeach
        </table>
        {{-- Final seccion de de seguridad personal en la vía --}}

        <div class="page-break"></div>

        {{-- Inicio seccion de datos de Capacidades Educativas  --}}
        <table class="table table-sm table-bordered">
            <tr class="indigo">
                <th colspan="3">Datos de sus Capacidades Educativas</th>
            </tr>
            <tr class="gray">
                <th colspan="3">Carreras Universitarias</th>
            </tr>
            <tr >
                <th>Institución</th>
                <th>Titulo</th>
                <th>Año</th>
            </tr>
            @foreach ($data->carreras_universitarias as $item)
            <tr>
                <td>{{ $item->institucion }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->ano }}</td>
            </tr>
            @endforeach
            <tr class="gray">
                <th colspan="3">Maestría</th>
            </tr>
            <tr >
                <th>Institución</th>
                <th>Titulo</th>
                <th>Año</th>
            </tr>
            @foreach ($data->maestrias as $item)
            <tr>
                <td>{{ $item->institucion }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->ano }}</td>
            </tr>
            @endforeach
            <tr class="gray">
                <th colspan="3">PHDs</th>
            </tr>
            <tr >
                <th>Institución</th>
                <th>Titulo</th>
                <th>Año</th>
            </tr>
            @foreach ($data->phd as $item)
            <tr>
                <td>{{ $item->institucion }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->ano }}</td>
            </tr>
            @endforeach
            <tr class="gray">
                <th colspan="3">Diplomados</th>
            </tr>
            <tr >
                <th>Institución</th>
                <th>Titulo</th>
                <th>Año</th>
            </tr>
            @foreach ($data->diplomados as $item)
            <tr>
                <td>{{ $item->institucion }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->ano }}</td>
            </tr>
            @endforeach
            <tr class="gray">
                <th colspan="3">Cursos Técnicos</th>
            </tr>
            <tr >
                <th>Institución</th>
                <th>Titulo</th>
                <th>Año</th>
            </tr>
            @foreach ($data->cursos_tecnicos as $item)
            <tr>
                <td>{{ $item->institucion }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->ano }}</td>
            </tr>
            @endforeach
            <tr class="gray">
                <th colspan="3">Talleres</th>
            </tr>
            <tr >
                <th>Institución</th>
                <th>Titulo</th>
                <th>Año</th>
            </tr>
            @foreach ($data->talleres as $item)
            <tr>
                <td>{{ $item->institucion }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->ano }}</td>
            </tr>
            @endforeach
            <tr class="gray">
                <th colspan="3">De Participación</th>
            </tr>
            <tr >
                <th>Institución</th>
                <th>Titulo</th>
                <th>Año</th>
            </tr>
            @foreach ($data->participacion as $item)
            <tr>
                <td>{{ $item->institucion }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->ano }}</td>
            </tr>
            @endforeach
        </table>
        {{-- Final seccion de ddatos Capacidades Educativas --}}

        <div class="page-break"></div>

        {{-- Inicio seccion de datos de sus actividades laborales   --}}
        <table class="table table-sm table-bordered">
            <tr class="indigo">
                <th colspan="4">Datos de sus Actividades Laborales</th>
            </tr>
            <tr class="gray">
                <th colspan="4">Estatus Laboral</th>
            </tr>
            <tr>
                <th>Estatus</th>
                <th>Disponibilidad</th>
                <th>Rango de Hora</th>
                <th>Cantidad de Horas</th>
            </tr>
            <tr>
                <td>
                    @if (isset($data->datos_laborales->estatus_laboral))
                        {{ $data->datos_laborales->estatus_laboral }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->disponibilidad))
                        {{ $data->datos_laborales->disponibilidad }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->rango_hora))
                        {{ $data->datos_laborales->rango_hora }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->cantidad_hora))
                        {{ $data->datos_laborales->cantidad_hora }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="4">Labor</th>
            </tr>
            <tr>
                <td colspan="4">
                    @if (isset($data->datos_laborales->nombre_labor))
                        {{ $data->datos_laborales->nombre_labor }}
                    @endif
                </td>
            </tr>
            <tr>
                <th>Técnica</th>
                <th colspan="2">Profesional</th>
                <th>Tiempo de Experiencia</th>
            </tr>
            <tr>
                <td>
                    @if (isset($data->datos_laborales->tecnica))
                        {{ $data->datos_laborales->tecnica }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->profesional))
                        {{ $data->datos_laborales->profesional }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->tiempo_experiencia))
                        {{ $data->datos_laborales->tiempo_experiencia }}
                    @endif
                </td>
            </tr>
            <tr>
                <th colspan="4">Detalles</th>
            </tr>
            <tr>
                <td colspan="4">
                    @if (isset($data->datos_laborales->detalle))
                        {{ $data->datos_laborales->detalle }}
                    @endif
                </td>
            </tr>
            <tr class="gray">
                <th colspan="4">Empresa Actual</th>
            </tr>
            <tr>
                <th>Empresa</th>
                <th>Jefe Inmediato</th>
                <th>Teléfono</th>
                <th>Años</th>
            </tr>
            <tr>
                <td>
                    @if (isset($data->datos_laborales->empresa))
                        {{ $data->datos_laborales->empresa }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->jefe_inmediato))
                        {{ $data->datos_laborales->jefe_inmediato }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->telefono))
                        {{ $data->datos_laborales->telefono }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->anos))
                        {{ $data->datos_laborales->anos }}
                    @endif
                </td>
            </tr>
            <tr class="gray">
                <th colspan="4">Empresa Antigua</th>
            </tr>
            <tr>
                <th>Empresa</th>
                <th>Jefe Inmediato</th>
                <th>Teléfono</th>
                <th>Años</th>
            </tr>
            <tr>
                <td>
                    @if (isset($data->datos_laborales->empresa_old))
                        {{ $data->datos_laborales->empresa_old }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->jefe_inmediato_old))
                        {{ $data->datos_laborales->jefe_inmediato_old }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->telefono_old))
                        {{ $data->datos_laborales->telefono_old }}
                    @endif
                </td>
                <td>
                    @if (isset($data->datos_laborales->anos_old))
                        {{ $data->datos_laborales->anos_old }}
                    @endif
                </td>
            </tr>
        </table>
        <table class="table table-sm table-bordered">
            <tr class="gray">
                <th colspan="6">Experiencia Laboral</th>
            </tr>
            <tr>
                <th>Empresa</th>
                <th>Labor</th>
                <th>Fecha Ent.</th>
                <th>Fecha Sal.</th>
                <th>Cant. Año</th>
                <th>Cant. Meses</th>
            </tr>
            @foreach ($data->historial_laboral as $item)
            <tr>
                <td>{{ $item->empresa }}</td>
                <td>{{ $item->labor }}</td>
                <td>{{ $item->ano_entrada }}</td>
                <td>{{ $item->ano_salida }}</td>
                <td>{{ $item->cantidad_ano }}</td>
                <td>{{ $item->cantidad_meses }}</td>
            </tr>
            @endforeach
        </table>
        {{-- Final seccion de datos de sus actividades laborales   --}}


    </main>
</body>

</html>
