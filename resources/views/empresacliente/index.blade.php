@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Empresa Cliente</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div>

            <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th width="50px" class="nk-tb-col"><span>#</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>EMPRESA</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>REPRESENTANTE</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>CORREO CORPORATIVO</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>TELÉFONO CORPORATIVO</span></th>
                        <th width="50px" class="nk-tb-col"></th>
                    </tr><!-- .nk-tb-item -->
                </thead>
                <tbody>
                @foreach ($data as $datos)
                    @foreach ($datos->users as $item)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">{{ $loop->iteration  }}</td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="tb-product">
                                <span class="title">{{ $item->empresa }}</span>
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="title">{{ $item->representante }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="title">{{ $item->correo_empresa }}</span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="title">{{ $item->telefono_empresa }}</span>
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1 my-n1">
                                <li class="mr-n1">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{ url('empresas/'.$item->id.'/ver-empresa') }}"
                                                ><em class="icon ni ni-eye"></em><span>Ver Empresa</span></a></li>
                                                <li><a href="{{ url('/empresas/'.$item->id.'/editar-empresa') }}"
                                                ><em class="icon ni ni-edit"></em><span>Editar Empresa</span></a></li>
                                                <li>
                                                    <button class="btn delete-record" data-id="{{ $item->id }}">
                                                        <em class="icon ni ni-trash"></em>
                                                        <span>Eliminar Empresa</span>
                                                    </button>
                                                    <form id="formDelete-{{ $item->id }}" action="{{ url('/empresas/'.$item->id.'/eliminar-empresa') }}" method="POST">
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
