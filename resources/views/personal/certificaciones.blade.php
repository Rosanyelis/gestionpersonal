@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personal - Informaciones Confidenciales</h3>
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
                            <form id="form" action="{{ url('/personal/'.$id.'/guardar-certificaciones-y-depuraciones') }}" method="POST">
                                @csrf
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase active" data-toggle="tab" href="#tabItem5">
                                            <span>Cert. de Integridad Laboral </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem6">
                                            <span>Inv. de Acciones Contrarias a las Leyes </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem7">
                                            <span>Analítica y Psicometría </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" data-toggle="tab" href="#tabItem8">
                                            <span>Lev. de Campo</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabItem5">
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Certificado de la Procuraduría</label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                @if (old('certificado_procuraduria') == 'Si') checked @endif
                                                                name="certificado_procuraduria" id="certificadoSi"
                                                                value="Si">
                                                            <label class="custom-control-label" for="certificadoSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            @if (old('certificado_procuraduria') == 'No') checked @endif
                                                            name="certificado_procuraduria" id="certificadoNo"
                                                            value="No">
                                                            <label class="custom-control-label" for="certificadoNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('certificado_procuraduria'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('certificado_procuraduria') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detallecert" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadop" class="form-control " value="{{ old('resultadop') }}">
                                                    </div>
                                                    @if ($errors->has('resultadop'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadop') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallep" class="form-control form-control-sm" id="detallep"
                                                        >{{ old('detallep') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallep'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallep') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Certificado Institución del Orden </label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                @if (old('certificado_institucion') == 'Si') checked @endif
                                                                name="certificado_institucion" id="certificadoinstSi"
                                                                value="Si">
                                                            <label class="custom-control-label" for="certificadoinstSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            @if (old('certificado_institucion') == 'No') checked @endif
                                                            name="certificado_institucion" id="certificadoinstNo"
                                                            value="No">
                                                            <label class="custom-control-label" for="certificadoinstNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('certificado_institucion'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('certificado_institucion') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detallecertins" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi" class="form-control " value="{{ old('resultadoi') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei" class="form-control" id="detallei" ></textarea>
                                                    </div>
                                                    @if ($errors->has('detallei'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tabItem6">
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Posee Delitos?</label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="delito" id="delitosSi"
                                                            @if (old('delito')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="delitosSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="delito" id="delitosNo"
                                                            @if (old('delito')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="delitosNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('delito'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('delito') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="investigaciones" >
                                            <div class="row g-3">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="form-label">Investigación profunda de vínculos con actividad antisocial</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <ul class="custom-control-group g-3 align-center flex-wrap">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input"
                                                                name="actividad_antisocial" id="actividad_antisocialSi"
                                                                @if (old('actividad_antisocial')== 'Si') checked @endif
                                                                value="Si">
                                                                <label class="custom-control-label" for="actividad_antisocialSi">Si</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input"
                                                                name="actividad_antisocial" id="actividad_antisocialNo"
                                                                @if (old('actividad_antisocial')== 'No') checked @endif
                                                                value="No">
                                                                <label class="custom-control-label" for="actividad_antisocialNo">No</label>
                                                            </div>
                                                        </li>
                                                        @if ($errors->has('actividad_antisocial'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('actividad_antisocial') }}
                                                            </span>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="detalleAct" class="row g-3">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Resultado</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="resultadop1" class="form-control " value="{{ old('resultadop1') }}">
                                                        </div>
                                                        @if ($errors->has('resultadop1'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('resultadop1') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Detalles</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <textarea name="detallep1" class="form-control"
                                                            id="detallep1" >{{ old('detallep1') }}</textarea>
                                                        </div>
                                                        @if ($errors->has('detallep1'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('detallep1') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="form-label">Reporte de actividades no procesada </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <ul class="custom-control-group g-3 align-center flex-wrap">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input"
                                                                name="reporte_actividad_noprocesada" id="reporte_actividad_noprocesadaSi"
                                                                @if (old('reporte_actividad_noprocesada')== 'Si') checked @endif
                                                                value="Si">
                                                                <label class="custom-control-label" for="reporte_actividad_noprocesadaSi">Si</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input"
                                                                name="reporte_actividad_noprocesada" id="reporte_actividad_noprocesadaNo"
                                                                @if (old('reporte_actividad_noprocesada')== 'No') checked @endif
                                                                value="No">
                                                                <label class="custom-control-label" for="reporte_actividad_noprocesadaNo">No</label>
                                                            </div>
                                                        </li>
                                                        @if ($errors->has('reporte_actividad_noprocesada'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('reporte_actividad_noprocesada') }}
                                                            </span>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div id="detalleRep" class="row g-3">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Resultado</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="resultadoi2" class="form-control " value="{{ old('resultadoi2') }}">
                                                        </div>
                                                        @if ($errors->has('resultadoi2'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('resultadoi2') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Detalles</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <textarea name="detallei2" class="form-control"
                                                            id="detallei2" >{{ old('detallei2') }}</textarea>
                                                        </div>
                                                        @if ($errors->has('detallei2'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('detallei2') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabItem7">
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Prueba Psicométrica</label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="prueba_psicometrica" id="prueba_psicometricaSi"
                                                            @if (old('prueba_psicometrica')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="prueba_psicometricaSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="prueba_psicometrica" id="prueba_psicometricaNo"
                                                            @if (old('prueba_psicometrica')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="prueba_psicometricaNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('prueba_psicometrica'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('prueba_psicometrica') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detallePsico" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadop3" class="form-control " value="{{ old('resultadop3') }}">
                                                    </div>
                                                    @if ($errors->has('resultadop3'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadop3') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallep3" class="form-control form-control-sm" id="detallep3"
                                                        >{{ old('detallep3') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallep3'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallep3') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Prueba Enfermedades contagiosas </label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="enfermedades_contagiosas" id="enfermedades_contagiosasSi"
                                                            @if (old('enfermedades_contagiosas')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="enfermedades_contagiosasSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="enfermedades_contagiosas" id="enfermedades_contagiosasNo"
                                                            @if (old('enfermedades_contagiosas')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="enfermedades_contagiosasNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('enfermedades_contagiosas'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('enfermedades_contagiosas') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleEnfer" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi4" class="form-control " value="{{ old('resultadoi4') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi4'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi4') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei4" class="form-control form-control-sm" id="detallei4"
                                                        >{{ old('detallei4') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei4'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei4') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Prueba abuso consumo alcohol  </label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="consumo_alcohol" id="consumo_alcoholSi"
                                                            @if (old('consumo_alcohol')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="consumo_alcoholSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="consumo_alcohol" id="consumo_alcoholNo"
                                                            @if (old('consumo_alcohol')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="consumo_alcoholNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('consumo_alcohol'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('consumo_alcohol') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleAlc" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi5" class="form-control " value="{{ old('resultadoi5') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi5'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi5') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei5" class="form-control form-control-sm" id="detallei5"
                                                        >{{ old('detallei5') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei5'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei5') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Consumo de sustancia prohibida</label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="sustancia_prohibida" id="sustancia_prohibidaSi"
                                                            @if (old('sustancia_prohibida')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="sustancia_prohibidaSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="sustancia_prohibida" id="sustancia_prohibidaNo"
                                                            @if (old('sustancia_prohibida')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="sustancia_prohibidaNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('sustancia_prohibida'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('sustancia_prohibida') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleProh" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi6" class="form-control " value="{{ old('resultadoi6') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi6'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi6') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei6" class="form-control form-control-sm" id="detallei6"
                                                        >{{ old('detallei6') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei6'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei6') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabItem8">
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Visita Domiciliaria</label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="visita_domiciliaria" id="visita_domiciliariaSi"
                                                            @if (old('visita_domiciliaria')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="visita_domiciliariaSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="visita_domiciliaria" id="visita_domiciliariaNo"
                                                            @if (old('visita_domiciliaria')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="visita_domiciliariaNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('visita_domiciliaria'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('visita_domiciliaria') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleDom" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi7" class="form-control " value="{{ old('resultadoi7') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi7'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi7') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei7" class="form-control form-control-sm" id="detallei7"
                                                        >{{ old('detallei7') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei7'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei7') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Levantamiento coordenado </label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_coordinado" id="levantamiento_coordinadoSi"
                                                            @if (old('levantamiento_coordinado')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="levantamiento_coordinadoSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_coordinado" id="levantamiento_coordinadoNo"
                                                            @if (old('levantamiento_coordinado')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="levantamiento_coordinadoNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('levantamiento_coordinado'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('levantamiento_coordinado') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleLev" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi8" class="form-control " value="{{ old('resultadoi8') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi8'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi8') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei8" class="form-control form-control-sm" id="detallei8"
                                                        >{{ old('detallei8') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei8'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei8') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Investigación de entorno </label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="investigacion_entorno" id="investigacion_entornoSi"
                                                            @if (old('investigacion_entorno')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="investigacion_entornoSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="investigacion_entorno" id="investigacion_entornoNo"
                                                            @if (old('investigacion_entorno')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="investigacion_entornoNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('investigacion_entorno'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('investigacion_entorno') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleInv" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi9" class="form-control " value="{{ old('resultadoi9') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi9'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi9') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei9" class="form-control form-control-sm" id="detallei9"
                                                        >{{ old('detallei9') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei9'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei9') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Levantamiento de Dactilares </label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_dactilar" id="levantamiento_dactilarSi"
                                                            @if (old('levantamiento_dactilar')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="levantamiento_dactilarSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_dactilar" id="levantamiento_dactilarNo"
                                                            @if (old('levantamiento_dactilar')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="levantamiento_dactilarNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('levantamiento_dactilar'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('levantamiento_dactilar') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleDac" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi10" class="form-control " value="{{ old('resultadoi10') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi10'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi10') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei10" class="form-control form-control-sm" id="detallei10"
                                                        >{{ old('detallei10') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei10'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei10') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Levantamientos de características fotográfica </label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_fotografia" id="levantamiento_fotografiaSi"
                                                            @if (old('levantamiento_fotografia')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="levantamiento_fotografiaSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_fotografia" id="levantamiento_fotografiaNo"
                                                            @if (old('levantamiento_fotografia')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="levantamiento_fotografiaNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('levantamiento_fotografia'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('levantamiento_fotografia') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleFot" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi11" class="form-control " value="{{ old('resultadoi11') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi10'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi11') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei11" class="form-control form-control-sm" id="detallei11"
                                                        >{{ old('detallei11') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei11'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei11') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Levantamiento de integridad familiar </label>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="custom-control-group g-3 align-center flex-wrap">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="integridad_familiar" id="integridad_familiarSi"
                                                            @if (old('integridad_familiar')== 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="integridad_familiarSi">Si</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="integridad_familiar" id="integridad_familiarNo"
                                                            @if (old('integridad_familiar')== 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="integridad_familiarNo">No</label>
                                                        </div>
                                                    </li>
                                                    @if ($errors->has('integridad_familiar'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('integridad_familiar') }}
                                                        </span>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="detalleFam" class="row g-3">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Resultado</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="resultadoi12" class="form-control " value="{{ old('resultadoi12') }}">
                                                    </div>
                                                    @if ($errors->has('resultadoi12'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('resultadoi12') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Detalles</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea name="detallei12" class="form-control form-control-sm" id="detallei12"
                                                        >{{ old('detallei12') }}</textarea>
                                                    </div>
                                                    @if ($errors->has('detallei12'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('detallei12') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-gs">
                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
                                            <!-- <input type="hidden" id="datosHistorial" name="historialLaboral"> -->
                                            <button type="button" id="guardar" class="btn btn-lg btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

            $('#investigaciones').hide();
            $('#detallecert').hide();
            $('#detallecertins').hide();
            $('#detalleAct').hide();
            $('#detalleRep').hide();
            $('#detallePsico').hide();
            $('#detalleEnfer').hide();
            $('#detalleAlc').hide();
            $('#detalleProh').hide();
            $('#detalleDom').hide();
            $('#detalleLev').hide();
            $('#detalleInv').hide();
            $('#detalleDac').hide();
            $('#detalleFot').hide();
            $('#detalleFam').hide();

            $('#certificadoSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detallecert').show();
                }
            });
            $('#certificadoNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detallecert').hide();
                }
            });

            $('#certificadoinstSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detallecertins').show();
                }
            });
            $('#certificadoinstNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detallecertins').hide();
                }
            });
            $('#delitosSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#investigaciones').show();
                }
            });
            $('#delitosNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#investigaciones').hide();
                }
            });
            $('#actividad_antisocialSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleAct').show();
                }
            });
            $('#actividad_antisocialNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleAct').hide();
                }
            });
            $('#reporte_actividad_noprocesadaSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleRep').show();
                }
            });
            $('#reporte_actividad_noprocesadaNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleRep').hide();
                }
            });
            $('#prueba_psicometricaSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detallePsico').show();
                }
            });
            $('#prueba_psicometricaNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detallePsico').hide();
                }
            });
            $('#enfermedades_contagiosasSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleEnfer').show();
                }
            });
            $('#enfermedades_contagiosasNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleEnfer').hide();
                }
            });
            $('#consumo_alcoholSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleAlc').show();
                }
            });
            $('#consumo_alcoholNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleAlc').hide();
                }
            });
            $('#sustancia_prohibidaSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleProh').show();
                }
            });
            $('#sustancia_prohibidaNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleProh').hide();
                }
            });
            $('#visita_domiciliariaSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleDom').show();
                }
            });
            $('#visita_domiciliariaNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleDom').hide();
                }
            });

            $('#levantamiento_coordinadoSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleLev').show();
                }
            });
            $('#levantamiento_coordinadoNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleLev').hide();
                }
            });
            $('#investigacion_entornoSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleInv').show();
                }
            });
            $('#investigacion_entornoNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleInv').hide();
                }
            });
            $('#levantamiento_dactilarSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleDac').show();
                }
            });
            $('#levantamiento_dactilarNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleDac').hide();
                }
            });
            $('#levantamiento_fotografiaSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleFot').show();
                }
            });
            $('#levantamiento_fotografiaNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleFot').hide();
                }
            });
            $('#integridad_familiarSi').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleFam').show();
                }
            });
            $('#integridad_familiarNo').click(function() {
                if ($(this).is(':checked')) {
                    $('#detalleFam').hide();
                }
            });

            $('#guardar').click(function() {
                $('#form').submit();
                $('#guardar').attr('disabled', true);
                $('#guardar').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span> Por favor, espere... </span>'
                    );
            });

        })(NioApp, jQuery);
    </script>
@endsection
