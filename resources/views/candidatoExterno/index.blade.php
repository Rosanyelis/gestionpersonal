@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Personal Externo</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('/candidatos-externos/nuevo-candidato-externo') }}" class="btn btn-primary">
                                            <em class="icon ni ni-plus-medi-fill"></em>
                                            <span>Nuevo Personal Externo</span>
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
                        <th class="nk-tb-col tb-col-sm"><span>Nombre y Apellido</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Cedula</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Empresa</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Sucursal</span></th>
                        <th class="nk-tb-col tb-col-sm"><span>Autorizado</span></th>
                        <th width="50px" class="nk-tb-col"></th>
                    </tr><!-- .nk-tb-item -->
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">{{ $loop->iteration }}</td>
                        <td class="nk-tb-col tb-col-sm">
                            <span class="tb-product">
                                <span class="title">{{ $item->nombres }} {{ $item->apellidos }}</span>
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-sm">{{ $item->cedula }}</td>
                        <td class="nk-tb-col tb-col-sm">{{ $item->empresa }}</td>
                        <td class="nk-tb-col tb-col-sm">{{ $item->sucursal }}</td>
                        <td class="nk-tb-col tb-col-sm">{{ $item->autorizado }}</td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1 my-n1">
                                <li class="mr-n1">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-plain no-bdr sm">
                                                <li>
                                                    <a href="{{ url('/candidatos-externos/'.$item->id.'/ver-perfil-de-candidato-externo') }}" >
                                                        <em class="icon ni ni-eye"></em>
                                                        <span>Ver Perfil</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/candidatos-externos/'.$item->id.'/editar-candidato-externo') }}" >
                                                        <em class="icon ni ni-edit-alt-fill"></em>
                                                        <span>Editar</span>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ url('/candidatos-externos/'.$item->id.'/investigacion-laboral') }}">
                                                        <em class="icon ni ni-user-list-fill"></em>
                                                        <span>Inv. Integridad Laboral</span>
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

        })(NioApp, jQuery);
    </script>
@endsection

