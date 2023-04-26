@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Personal</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('/personal/nuevo-personal') }}" class="btn btn-primary">
                                            <em class="icon ni ni-plus-medi-fill"></em>
                                            <span>Nuevo Personal</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div>
            <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head text-uppercase">
                        <th width="50px" class="nk-tb-col"><span>#</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Código</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Nombre y Apellido</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Cedula</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Nacionalidad</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Tipo Personal</span></th>
                        <th width="50px" class="nk-tb-col"></th>
                    </tr><!-- .nk-tb-item -->
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">{{ $loop->iteration }}</td>
                        <td class="nk-tb-col tb-col-sm">{{ $item->codigo }}</td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="tb-product">
                                <span class="title">{{ $item->nombres }} {{ $item->apellidos }}</span>
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">{{ $item->cedula }}</td>
                        <td class="nk-tb-col tb-col-sm">{{ $item->nacionalidad }}</td>
                        <td class="nk-tb-col tb-col-sm">
                            @if ($item->user_id)
                                {{ $item->user->empresa }}
                            @else
                            {{ __('Propio') }}
                            @endif
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1 my-n1">
                                <li class="mr-n1">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-plain no-bdr sm">
                                                <li>
                                                    <a href="{{ url('/personal/'.$item->id.'/ver-perfil-de-personal') }}" >
                                                        <em class="icon ni ni-eye"></em>
                                                        <span>Ver Perfil de Personal</span>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ url('/personal/'.$item->id.'/actividades-educativa') }}">
                                                        <em class="icon ni ni-contact"></em>
                                                        <span>Actividades Educativas</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/personal/'.$item->id.'/actividades-laboral') }}">
                                                        <em class="icon ni ni-briefcase"></em>
                                                        <span>Actividades Laborales</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/personal/'.$item->id.'/investigacion-laboral') }}">
                                                        <em class="icon ni ni-user-list-fill"></em>
                                                        <span>Inv. Integridad Laboral</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/personal/'.$item->id.'/actividades-no-procesadas') }}">
                                                        <em class="icon ni ni-briefcase"></em>
                                                        <span>Actividades no Procesadas</span>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ url('/personal/'.$item->id.'/informe-personal') }}" target="blank" >
                                                        <em class="icon ni ni-article"></em>
                                                        <span>Informe Personal Completo</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/personal/'.$item->id.'/perfil-curricular') }}" target="blank" >
                                                        <em class="icon ni ni-article"></em>
                                                        <span>Perfil Curricular</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/personal/'.$item->id.'/informe-confidencial') }}" target="blank" >
                                                        <em class="icon ni ni-reports-alt"></em>
                                                        <span>Informe Confidencial</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr><!-- .nk-tb-item -->
                    @endforeach
                </tbody>
            </table><!-- .nk-tb-list -->
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        (function(NioApp, $){
            'use strict';

            @include('layouts.alerts')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $('.datatable-init tbody').on('click', '.delete-record', function(){
            //     let dataid = $(this).data('id');
            //     let baseUrl = '{{ url('admin/configuraciones/categorias') }}/' + dataid +
            //         '/eliminar-categoria';
            //     Swal.fire({
            //         title: '¿Está Seguro de Desactivar el Registro?',
            //         text: "Si tiene datos dependientes, no podrá desactivarlo!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonText: 'Si, estoy seguro!'
            //     }).then((result) => {
            //         if (result.value) {
            //             $.ajax({
            //                 type: 'POST',
            //                 url: baseUrl,
            //                 dataType: 'json',
            //                 success: function(response) {
            //                    console.log(response);
            //                     localStorage.setItem("success", 1);
            //                     location.reload();
            //                 }
            //             });
            //         }
            //     });
            // });
        })(NioApp, jQuery);
    </script>
@endsection

