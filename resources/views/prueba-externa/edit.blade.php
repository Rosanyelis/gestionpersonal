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
                                                <input type="date" class="form-control" id="fw-vr-lugar" name="fecha"
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
                                                <input type="text" class="form-control" id="fw-vr-lugar" name="empresa"
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
                                                <input type="text" class="form-control" id="fw-vr-lugar" name="sucursal"
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
                                                <input type="text" class="form-control" id="fw-vr-lugar"
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
                                    <div class="col-md-12 ">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Tipo de Prueba</th>
                                                    <th scope="col" colspan="2">Respuesta</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-uppercase">
                                                <tr>
                                                    <th colspan="4" class="text-center">Certificado de integridad laboral y depuraciones</th>
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
                                                </tr>
                                                <tr>
                                                    <th colspan="4" class="text-center">Investigación y depuración de actividades contrarias a las leyes</th>
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
                                                </tr>
                                                <tr>
                                                    <th colspan="4" class="text-center">Analística y psicometría</th>
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
                                                </tr>
                                                <tr>
                                                    <th colspan="4" class="text-center">Levantamiento de campo</th>
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
                                                </tr>
                                                <tr>
                                                    <th colspan="4" class="text-center">Resultado</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="resultado" class="form-control " value="{{ $data->resultado }}" placeholder="Ejemplo: La prueba fué exitósa">
                                                        </div>
                                                        @if ($errors->has('resultado'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('resultado') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="4" class="text-center">Detalles</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="form-control-wrap">
                                                            <textarea name="detalle" class="form-control form-control-sm" id="detalle"
                                                             placeholder="Ejemplo: Lorem ipsum dolor sit amet, consectetur adipiscing eli">{{ $data->detalle }}</textarea>
                                                        </div>
                                                        @if ($errors->has('detalle'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('detalle') }}
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
