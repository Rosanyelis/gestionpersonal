@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personal - Actividades Laborales</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/personal') }}" class="btn btn-secondary">
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
                    @if ($errors->any())
                        <div class="alert alert-pro alert-danger">
                            <ul class="alert-text text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="nk-block">
                                <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
                                    <h5 class="title text-white text-uppercase ">Estatus Laboral</h5>
                                    @if (!$data->datos_laborales)
                                        <a href="{{ url('/personal/' . $data->id . '/estatus-laboral/nuevo-estatus') }}"
                                            class="btn btn-sm btn-primary">
                                            <em class="icon ni ni-plus-sm"></em>
                                            <span>Nueva</span>
                                        </a>
                                    @else
                                    <a href="{{ url('/personal/' . $data->id . '/estatus-laboral/'.$data->datos_laborales->id.'/editar-estatus') }}"
                                        class="btn btn-sm btn-primary">
                                        <em class="icon ni ni-edit-alt-fill"></em>
                                        <span>Editar</span>
                                    </a>
                                    @endif
                                </div>
                                <div class="profile-ud-list">
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label text-uppercase">Estatus</span>
                                            <span class="profile-ud-value">
                                                @if (isset($data->datos_laborales->estatus_laboral))
                                                    {{ $data->datos_laborales->estatus_laboral }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label text-uppercase">Disponibilidad</span>
                                            <span class="profile-ud-value">
                                                @if (isset($data->datos_laborales->disponibilidad))
                                                    {{ $data->datos_laborales->disponibilidad }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label text-uppercase">Rango Horario</span>
                                            <span class="profile-ud-value">
                                                @if (isset($data->datos_laborales->rango_hora))
                                                    {{ $data->datos_laborales->rango_hora }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label text-uppercase">Cantidad de Horas</span>
                                            <span class="profile-ud-value">
                                                @if (isset($data->datos_laborales->cantidad_hora))
                                                    {{ $data->datos_laborales->cantidad_hora }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label text-uppercase">Labor</span>
                                            <span class="profile-ud-value">
                                                @if (isset($data->datos_laborales->nombre_labor))
                                                    {{ $data->datos_laborales->nombre_labor }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label text-uppercase">Técnica</span>
                                            <span class="profile-ud-value">
                                                @if (isset($data->datos_laborales->nombre_labor))
                                                    {{ $data->datos_laborales->nombre_labor }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label text-uppercase">Profesional</span>
                                            <span class="profile-ud-value">
                                                @if (isset($data->datos_laborales->profesional))
                                                    {{ $data->datos_laborales->profesional }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="profile-ud-item">
                                        <div class="profile-ud wider">
                                            <span class="profile-ud-label text-uppercase">Tiempo de experiencia</span>
                                            <span class="profile-ud-value">
                                                @if (isset($data->datos_laborales->tiempo_experiencia))
                                                    {{ $data->datos_laborales->tiempo_experiencia }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- .profile-ud-list -->
                            </div>
                            <div class="nk-block">
                                <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
                                    <h5 class="title text-white text-uppercase">Trabajo Actual</h5>
                                </div><!-- .nk-block-head -->
                                <table class="table mt-3">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th><span>Empresa</span></th>
                                            <th><span>Jefe Inmediato</span></th>
                                            <th><span>Teléfono</span></th>
                                            <th><span>AÑO</span></th>
                                        </tr>
                                    </thead><!-- .nk-tb-item -->
                                    <tbody>
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
                                        </tr><!-- .nk-tb-item -->
                                    </tbody>
                                </table><!-- .nk-tb-list -->
                            </div><!-- .nk-block -->
                            <div class="nk-block">
                                <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
                                    <h5 class="title text-white text-uppercase">Trabajo Anterior</h5>
                                </div><!-- .nk-block-head -->
                                <table class="table mt-3">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th><span>Empresa</span></th>
                                            <th><span>Jefe Inmediato</span></th>
                                            <th><span>Teléfono</span></th>
                                            <th><span>AÑO</span></th>
                                        </tr>
                                    </thead><!-- .nk-tb-item -->
                                    <tbody>
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
                                        </tr><!-- .nk-tb-item -->
                                    </tbody>
                                </table><!-- .nk-tb-list -->
                            </div><!-- .nk-block -->
                            <div class="nk-block">
                                <div class="nk-block-head nk-block-head-sm nk-block-between badge badge-dark p-1">
                                    <h5 class="title text-white text-uppercase">Experiencia Laboral</h5>
                                    <a href="{{ url('/personal/' . $data->id . '/experiencia-laboral/nueva-experiencia') }}"
                                        class="btn btn-sm btn-primary">
                                        <em class="icon ni ni-plus-sm"></em>
                                        <span>Nueva</span>
                                    </a>
                                </div><!-- .nk-block-head -->
                                <table class="table mt-3">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>#</th>
                                            <th><span>Empresa</span></th>
                                            <th><span>Labor</span></th>
                                            <th><span>Fecha Ent.</span></th>
                                            <th><span>Fecha Sal.</span></th>
                                            <th><span>Cant. Años</span></th>
                                            <th><span>Cant. Meses</span></th>
                                            <th></th>
                                        </tr>
                                    </thead><!-- .nk-tb-item -->
                                    <tbody>
                                        @if ($data->historial_laboral)
                                            @foreach ($data->historial_laboral as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->empresa }}</td>
                                                    <td>{{ $item->labor }}</td>
                                                    <td>{{ $item->ano_entrada }}</td>
                                                    <td>{{ $item->ano_salida }}</td>
                                                    <td>{{ $item->cantidad_ano }}</td>
                                                    <td>{{ $item->cantidad_meses }}</td>
                                                    <td>
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                            <li class="mr-n1">
                                                                <div class="dropdown">
                                                                    <a href="#"
                                                                        class="dropdown-toggle btn btn-icon btn-trigger"
                                                                        data-toggle="dropdown"><em
                                                                            class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li>
                                                                                <a
                                                                                    href="{{ url('/personal/' . $data->id . '/experiencia-laboral/' . $item->id . '/editar-experiencia') }}">
                                                                                    <em class="icon ni ni-edit"></em>
                                                                                    <span>Editar</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn delete-record"
                                                                                    data-id="{{ $item->id }}">
                                                                                    <em class="icon ni ni-trash"></em>
                                                                                    <span>Eliminar
                                                                                        Experiencia</span>
                                                                                </button>
                                                                                <form id="formDelete-{{ $item->id }}"
                                                                                    action="{{ url('/personal/' . $data->id . '/experiencia-laboral/' . $item->id . '/eliminar-experiencia') }}"method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr><!-- .nk-tb-item -->
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table><!-- .nk-tb-list -->
                            </div><!-- .nk-block -->
                        </div><!-- .nk-block -->
                    </div><!-- .nk-block -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function(NioApp, $) {
            'use strict';

            @include('layouts.alerts')

            $('.table tbody').on('click', '.delete-record', function() {
                let dataid = $(this).data('id');
                let formDelete = $('#formDelete-' + dataid);
                console.log(formDelete);
                Swal.fire({
                    title: '¿Está Seguro de Eliminar el Registro?',
                    text: "Si tiene datos dependientes, no podrá eliminarlo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, estoy seguro!'
                }).then((result) => {
                    if (result.value) {
                        $(formDelete).submit();
                    }
                });
            });
        })(NioApp, jQuery);
    </script>
@endsection
