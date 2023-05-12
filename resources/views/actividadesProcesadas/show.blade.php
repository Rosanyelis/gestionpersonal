@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Ver Reporte de Actividad No Procesada</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/personal/' . $id . '/actividades-no-procesadas') }}"
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
                                            <h5 class="title">Reporte de: {{ $data->personal->nombres }}
                                                {{ $data->personal->apellidos }}</h5>
                                        </div><!-- .nk-block-head -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Realizado por:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->user->name }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Quien Reporta:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->quien_reporta }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Fecha:</label>
                                                    <div class="form-control-wrap">
                                                        {!! \Carbon\Carbon::parse($data->fecha)->format('d-m-Y') !!} {!! \Carbon\Carbon::parse($data->hora)->format('h:m A') !!}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Empresa:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->empresa }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Provincia:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->provincia }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Municipio:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->municipio }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Sector:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->sector }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Tipo de Reporte:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->tipo_reporte }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Involucrado:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->tipo_involucrado }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-2">
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group">
                                                    <label class="form-label text-uppercase" for="default-01">Detalles:</label>
                                                    <div class="form-control-wrap">
                                                        {{ $data->detalles }}
                                                    </div>
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
