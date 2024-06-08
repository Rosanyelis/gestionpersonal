@extends('layouts.app')
@section('content')
    <div class="nk-content">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Personal Externo - Investigación de Integridad Laboral</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <a href="{{ url('/candidatos-externos/'.$id.'/ver-perfil-de-candidato-externo') }}" class="btn btn-secondary">
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
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <form id="form"
                                action="{{ url('/candidatos-externos/' . $id . '/integridad-laboral/'.$data->id.'/actualizar-evaluacion') }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-gs">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Fecha</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control text-capitalize" id="fw-vr-lugar" name="fecha"
                                                    value="{{ $data->fecha }}">
                                                @if ($errors->has('fecha'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('fecha') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Empresa</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control text-capitalize" id="fw-vr-lugar" name="empresa"
                                                    value="{{ $data->empresa }}" placeholder="Ejm: El Caribe C.A">
                                                @if ($errors->has('empresa'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('empresa') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Sucursal</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control text-capitalize" id="fw-vr-lugar" name="sucursal"
                                                    value="{{ $data->sucursal }}" placeholder="Ejm: El Caribe 2 C.A">
                                                @if ($errors->has('sucursal'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('sucursal') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Autorizado</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control text-capitalize" id="fw-vr-lugar"
                                                    name="autorizado" value="{{ $data->autorizado }}"
                                                    placeholder="Ejm: Carlos Pérez">
                                                @if ($errors->has('autorizado'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('autorizado') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label text-uppercase" for="fw-vr-lugar">Correo de Autorizado</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control text-capitalize" id="fw-vr-lugar"
                                                    name="correo_autorizado" value="{{ $data->correo_autorizado }}"
                                                    placeholder="Ejm: Carlos Pérez">
                                                @if ($errors->has('correo_autorizado'))
                                                    <span class="invalid text-danger">
                                                        {{ $errors->first('correo_autorizado') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th scope="col" width="2%">#</th>
                                                    <th scope="col" width="30%">Tipo de Prueba</th>
                                                    <th scope="col" colspan="2" width="10%">Respuesta</th>
                                                    <th scope="col" width="10%">Código</th>
                                                    <th scope="col">Detalle</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-uppercase">
                                                <tr>
                                                    <th colspan="6" >Certificado de integridad laboral y depuraciones</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Certificado de la Procuraduría <br>
                                                    @if ($errors->has('certificado_procuraduria'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('certificado_procuraduria') }}
                                                        </span>
                                                    @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                @if ($data->certificado_procuraduria == 'Si') checked @endif
                                                                name="certificado_procuraduria" id="certificadoSi"
                                                                value="Si">
                                                            <label class="custom-control-label" for="certificadoSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            @if ($data->certificado_procuraduria == 'No') checked @endif
                                                            name="certificado_procuraduria" id="certificadoNo"
                                                            value="No">
                                                            <label class="custom-control-label" for="certificadoNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="1"
                                                                name="code_pro" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_pro) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info1" name="detalle_pro" class="form-control form-control-sm infoAlerta" id="detalle_pro"
                                                            value="{{ $data->detalle_pro }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Certificado Institución del Orden <br>
                                                        @if ($errors->has('certificado_institucion'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('certificado_institucion') }}
                                                            </span>
                                                        @endif</td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                                @if ($data->certificado_institucion == 'Si') checked @endif
                                                                name="certificado_institucion" id="certificadoinstSi"
                                                                value="Si">
                                                            <label class="custom-control-label" for="certificadoinstSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            @if ($data->certificado_institucion == 'No') checked @endif
                                                            name="certificado_institucion" id="certificadoinstNo"
                                                            value="No">
                                                            <label class="custom-control-label" for="certificadoinstNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="2"
                                                                name="code_ins" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_ins) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info2" name="detalle_ins" class="form-control form-control-sm infoAlerta" id="detalle_ins"
                                                        value="{{ $data->detalle_ins }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="6" >Investigación y depuración de actividades contrarias a las leyes</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Investigación profunda de vínculos con actividad antisocial <br>
                                                        @if ($errors->has('actividad_antisocial'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('actividad_antisocial') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="actividad_antisocial" id="actividad_antisocialSi"
                                                            @if ($data->actividad_antisocial == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="actividad_antisocialSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="actividad_antisocial" id="actividad_antisocialNo"
                                                            @if ($data->actividad_antisocial == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="actividad_antisocialNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="3"
                                                                name="code_ant" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_ant) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info3" name="detalle_ant" class="form-control form-control-sm infoAlerta" id="detalle_ant"
                                                        value="{{ $data->detalle_ant }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Reporte de actividades no procesada <br>
                                                        @if ($errors->has('reporte_actividad_noprocesada'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('reporte_actividad_noprocesada') }}
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="reporte_actividad_noprocesada" id="reporte_actividad_noprocesadaSi"
                                                            @if ($data->reporte_actividad_noprocesada == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="reporte_actividad_noprocesadaSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="reporte_actividad_noprocesada" id="reporte_actividad_noprocesadaNo"
                                                            @if ($data->reporte_actividad_noprocesada == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="reporte_actividad_noprocesadaNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="4"
                                                                name="code_nopro" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_nopro) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info4" name="detalle_nopro" class="form-control form-control-sm infoAlerta" id="detalle_nopro"
                                                        value="{{ $data->detalle_nopro }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="4" >Analística y psicometría</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Prueba Poligráfica <br>
                                                        @if ($errors->has('prueba_poligrafica'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('prueba_poligrafica') }}
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="prueba_poligrafica" id="prueba_poligraficaSi"
                                                            @if ($data->prueba_poligrafica == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="prueba_poligraficaSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="prueba_poligrafica" id="prueba_poligraficaNo"
                                                            @if ($data->prueba_poligrafica == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="prueba_poligraficaNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="5"
                                                                name="code_pol" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_pol) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info5" name="detalle_pol" class="form-control form-control-sm infoAlerta" id="detalle_pol"
                                                        value="{{ $data->detalle_pol }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>Prueba Psicométrica <br>
                                                    @if ($errors->has('prueba_psicometrica'))
                                                        <span class="invalid text-danger">
                                                            {{ $errors->first('prueba_psicometrica') }}
                                                        </span>
                                                    @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="prueba_psicometrica" id="prueba_psicometricaSi"
                                                            @if ($data->prueba_psicometrica == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="prueba_psicometricaSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="prueba_psicometrica" id="prueba_psicometricaNo"
                                                            @if ($data->prueba_psicometrica == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="prueba_psicometricaNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="6"
                                                                name="code_psi" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_psi) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info6" name="detalle_psi" class="form-control form-control-sm infoAlerta" id="detalle_psi"
                                                        value="{{ $data->detalle_psi }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">7</th>
                                                    <td>Prueba Enfermedades contagiosas <br>
                                                    @if ($errors->has('enfermedades_contagiosas'))
                                                        <span class="invalid text-danger">
                                                                {{ $errors->first('enfermedades_contagiosas') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="enfermedades_contagiosas" id="enfermedades_contagiosasSi"
                                                            @if ($data->enfermedades_contagiosas == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="enfermedades_contagiosasSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="enfermedades_contagiosas" id="enfermedades_contagiosasNo"
                                                            @if ($data->enfermedades_contagiosas == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="enfermedades_contagiosasNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="7"
                                                                name="code_cont" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_cont) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info7" name="detalle_cont" class="form-control form-control-sm infoAlerta" id="detalle_cont"
                                                        value="{{ $data->detalle_cont }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">8</th>
                                                    <td>Prueba abuso consumo alcohol <br>
                                                        @if ($errors->has('consumo_alcohol'))
                                                        <span class="invalid text-danger">
                                                                {{ $errors->first('consumo_alcohol') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="consumo_alcohol" id="consumo_alcoholSi"
                                                            @if ($data->consumo_alcohol == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="consumo_alcoholSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="consumo_alcohol" id="consumo_alcoholNo"
                                                            @if ($data->consumo_alcohol == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="consumo_alcoholNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="8"
                                                                name="code_alc" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_alc) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info8" name="detalle_alc" class="form-control form-control-sm infoAlerta" id="detalle_alc"
                                                        value="{{ $data->detalle_alc }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">9</th>
                                                    <td>Consumo de sustancia prohibida <br>
                                                        @if ($errors->has('sustancia_prohibida'))
                                                        <span class="invalid text-danger">
                                                                {{ $errors->first('sustancia_prohibida') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="sustancia_prohibida" id="sustancia_prohibidaSi"
                                                            @if ($data->sustancia_prohibida == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="sustancia_prohibidaSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="sustancia_prohibida" id="sustancia_prohibidaNo"
                                                            @if ($data->sustancia_prohibida == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="sustancia_prohibidaNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="9"
                                                                name="code_proh" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_proh) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info9" name="detalle_proh" class="form-control form-control-sm infoAlerta" id="detalle_proh"
                                                        value="{{ $data->detalle_proh }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="6" >Levantamiento de campo</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">10</th>
                                                    <td>Visita Domiciliaria <br>
                                                        @if ($errors->has('visita_domiciliaria'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('visita_domiciliaria') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="visita_domiciliaria" id="visita_domiciliariaSi"
                                                            @if ($data->visita_domiciliaria == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="visita_domiciliariaSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="visita_domiciliaria" id="visita_domiciliariaNo"
                                                            @if ($data->visita_domiciliaria == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="visita_domiciliariaNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="10"
                                                                name="code_dom" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_dom) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info10" name="detalle_dom" class="form-control form-control-sm infoAlerta" id="detalle_dom"
                                                        value="{{ $data->detalle_dom }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">11</th>
                                                    <td>Levantamiento coordenado <br>
                                                        @if ($errors->has('levantamiento_coordinado'))
                                                        <span class="invalid text-danger">
                                                                {{ $errors->first('levantamiento_coordinado') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_coordinado" id="levantamiento_coordinadoSi"
                                                            @if ($data->levantamiento_coordinado == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="levantamiento_coordinadoSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_coordinado" id="levantamiento_coordinadoNo"
                                                            @if ($data->levantamiento_coordinado == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="levantamiento_coordinadoNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="11"
                                                                name="code_coo" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_coo) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info11" name="detalle_coo" class="form-control form-control-sm infoAlerta" id="detalle_coo"
                                                        value="{{ $data->detalle_coo }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">12</th>
                                                    <td>Investigación de entorno <br>
                                                    @if ($errors->has('investigacion_entorno'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('investigacion_entorno') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="investigacion_entorno" id="investigacion_entornoSi"
                                                            @if ($data->investigacion_entorno == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="investigacion_entornoSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="investigacion_entorno" id="investigacion_entornoNo"
                                                            @if ($data->investigacion_entorno == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="investigacion_entornoNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="12"
                                                                name="code_ent" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_ent) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info12" name="detalle_ent" class="form-control form-control-sm infoAlerta" id="detalle_ent"
                                                        value="{{ $data->detalle_ent }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">13</th>
                                                    <td>Levantamiento de Dactilares <br>
                                                        @if ($errors->has('levantamiento_dactilar'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('levantamiento_dactilar') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_dactilar" id="levantamiento_dactilarSi"
                                                            @if ($data->levantamiento_dactilar == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="levantamiento_dactilarSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_dactilar" id="levantamiento_dactilarNo"
                                                            @if ($data->levantamiento_dactilar == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="levantamiento_dactilarNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="13"
                                                                name="code_dac" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_dac) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info13" name="detalle_dac" class="form-control form-control-sm infoAlerta" id="detalle_dac"
                                                        value="{{ $data->detalle_dac }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">14</th>
                                                    <td>Levantamientos de características fotográfica <br>
                                                        @if ($errors->has('levantamiento_fotografia'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('levantamiento_fotografia') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_fotografia" id="levantamiento_fotografiaSi"
                                                            @if ($data->levantamiento_fotografia == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="levantamiento_fotografiaSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="levantamiento_fotografia" id="levantamiento_fotografiaNo"
                                                            @if ($data->levantamiento_fotografia == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="levantamiento_fotografiaNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="14"
                                                                name="code_fot" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_fot) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info14" name="detalle_fot" class="form-control form-control-sm infoAlerta" id="detalle_fot"
                                                        value="{{ $data->detalle_fot }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">15</th>
                                                    <td>Levantamiento de integridad familiar <br>
                                                        @if ($errors->has('integridad_familiar'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('integridad_familiar') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="integridad_familiar" id="integridad_familiarSi"
                                                            @if ($data->integridad_familiar == 'Si') checked @endif
                                                            value="Si">
                                                            <label class="custom-control-label" for="integridad_familiarSi">Si</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input"
                                                            name="integridad_familiar" id="integridad_familiarNo"
                                                            @if ($data->integridad_familiar == 'No') checked @endif
                                                            value="No">
                                                            <label class="custom-control-label" for="integridad_familiarNo">No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control form-select alertasAjax" data-id="15"
                                                                name="code_fam" data-placeholder="Seleccione una opción">
                                                                <option label="empty" value=""></option>
                                                                @foreach ($alertas as $alerta)
                                                                    <option value="{{ $alerta->codigo }}"
                                                                        @if ($alerta->codigo == $data->code_fam) selected @endif>
                                                                        {{ $alerta->codigo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="info15" name="detalle_fam" class="form-control form-control-sm infoAlerta" id="detalle_fam"
                                                        value="{{ $data->detalle_fam }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="6" >Detalles</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="6">
                                                        <div class="form-control-wrap">
                                                            <textarea name="detalle_final" class="form-control form-control-sm" id="detalle"
                                                             placeholder="Ejemplo: Lorem ipsum dolor sit amet, consectetur adipiscing eli">{{ $data->detalle_final }}</textarea>
                                                        </div>
                                                        @if ($errors->has('detalle_final'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('detalle_final') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row g-gs">
                                    <div class="col-md-12 ">
                                        <div class="form-group float-right">
                                            <!-- <input type="hidden" id="datosHistorial" name="historialLaboral"> -->
                                            <button type="button" id="guardar"
                                                class="btn btn-lg btn-primary">Guardar</button>
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

            $(".alertasAjax").on("change", function() {
                let code = $(this).val();
                const ID = $(this).data("id");
                let url = "{{ route('alertasAjaxCode', "+code+") }}";
                $.ajax({
                    type: "GET",
                    url: "{{ route('alertasAjaxCode', "+code+") }}",
                    data: {
                        'code': code,
                    },
                    success: function(data) {
                        let Txt = "#info" + ID + "";
                        $(Txt).val(data.descripcion);
                    }
                });

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
