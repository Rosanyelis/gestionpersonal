@extends('layouts.app')
@section('content')
<div class="nk-content">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Ver Usuario</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                                    class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <a href="{{ url('/configuraciones/usuarios') }}"
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
                <div class="card">
                    <div class="card-aside-wrap">
                        <div class="card-content">
                            <div class="card-inner">
                                <div class="nk-block">
                                    <div class="nk-block-head">
                                        <h5 class="title">Usuario: {{ $data->name }}</h5>
                                    </div><!-- .nk-block-head -->
                                    @if ($data->tipo == 'Empleado')
                                    <div class="profile-ud-list">
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Cédula</span>
                                                <span class="profile-ud-value">{{ $data->cedula }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Teléfono</span>
                                                <span class="profile-ud-value">{{ $data->telefono }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Nombre</span>
                                                <span class="profile-ud-value">{{ $data->nombre }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Flota</span>
                                                <span class="profile-ud-value">{{ $data->flota }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Apellido</span>
                                                <span class="profile-ud-value">{{ $data->apellido }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Correo Personal</span>
                                                <span class="profile-ud-value">{{ $data->correo_personal }}</span>
                                            </div>
                                        </div>
                                    </div><!-- .profile-ud-list -->
                                    @endif
                                    @if ($data->tipo == 'Empresa')

                                    <div class=" col-md-2">
                                        <img src="{{ asset(''.$data->logo.'') }}" class="card-img-top"  alt="{{ $data->empresa }}">
                                    </div>
                                    <div class="profile-ud-list mt-3">
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Empresa</span>
                                                <span class="profile-ud-value">{{ $data->empresa }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Correo</span>
                                                <span class="profile-ud-value">{{ $data->correo_empresa }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Actividad</span>
                                                <span class="profile-ud-value">{{ $data->actividad }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Provincia</span>
                                                <span class="profile-ud-value">{{ $data->provincia }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Teléfono</span>
                                                <span class="profile-ud-value">{{ $data->telefono_empresa }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Municipio</span>
                                                <span class="profile-ud-value">{{ $data->municipio }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Sector</span>
                                                <span class="profile-ud-value">{{ $data->sector }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Calle</span>
                                                <span class="profile-ud-value">{{ $data->calle }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Número</span>
                                                <span class="profile-ud-value">{{ $data->numero }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">referencia</span>
                                                <span class="profile-ud-value">{{ $data->referencia }}</span>
                                            </div>
                                        </div>
                                    </div><!-- .profile-ud-list -->
                                    @endif
                                </div><!-- .nk-block -->
                                <div class="nk-block">
                                    <div class="nk-block-head nk-block-head-line">
                                        <h6 class="title overline-title text-base">Datos de Usuario</h6>
                                    </div><!-- .nk-block-head -->
                                    <div class="profile-ud-list">
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Usuario</span>
                                                <span class="profile-ud-value">{{ $data->name }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Rol</span>
                                                <span class="profile-ud-value">
                                                    @foreach ($data->roles as $rol)
                                                        {{ $rol->name }}
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label text-uppercase">Correo</span>
                                                <span class="profile-ud-value">{{ $data->email }}</span>
                                            </div>
                                        </div>
                                    </div><!-- .profile-ud-list -->
                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
