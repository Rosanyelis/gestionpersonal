@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Reporte de Actividades No Procesadas</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                    <a href="{{ url('/personal/'.$id.'/actividades-no-procesadas/nuevo-reporte') }}" class="btn btn-primary">
                                            <em class="icon ni ni-plus-medi-fill"></em>
                                            <span>Nuevo Reporte</span>
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
                        <th class="nk-tb-col tb-col-sm"><span>Quien Reporta</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>FECHA</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>HORA</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>INVOLUCRADO</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>EMPRESA</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>TIPO REPORTE</span></th>
                        <th width="50px" class="nk-tb-col"></th>
                    </tr><!-- .nk-tb-item -->
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">{{ $loop->iteration  }}</td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="title">
                                {{ $item->quien_reporta }}
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="tb-product">
                                <span class="title">
                                    {!! \Carbon\Carbon::parse($item->fecha)->format('d-m-Y') !!}
                                </span>
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="tb-product">
                                <span class="title">
                                {!! \Carbon\Carbon::parse($item->hora)->format('h:m A') !!}
                                </span>
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="title">{{ $item->tipo_involucrado }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="title">{{ $item->empresa }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="title">{{ $item->tipo_reporte }}</span>
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1 my-n1">
                                <li class="mr-n1">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{ url('/personal/'.$id.'/actividades-no-procesadas/'.$item->id.'/ver-reporte') }}"
                                                ><em class="icon ni ni-eye"></em><span>Ver Reporte</span></a></li>
                                                <li><a href="{{ url('/personal/'.$id.'/actividades-no-procesadas/'.$item->id.'/editar-reporte') }}"
                                                ><em class="icon ni ni-edit"></em><span>Editar Reporte</span></a></li>
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

            $('.datatable-init tbody').on('click', '.delete-record', function(){
                let dataid = $(this).data('id');
                let formDelete = $('#formDelete-'+dataid);
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
