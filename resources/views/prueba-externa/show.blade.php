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
                            <div class="row g-gs">
                                <div class="col-md-12 ">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th scope="col">#</th>
                                                <th scope="col">Tipo de Prueba</th>
                                                <th scope="col" colspan="2">Respuesta</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-center"></th>
                                                <th>SI</th>
                                                <th>NO</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-uppercase">
                                            <tr>
                                                <th colspan="4" class="text-center">Certificado de integridad laboral y
                                                    depuraciones</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Certificado de la Procuraduría <br></td>
                                                <td>
                                                    @if ($data->certificado_procuraduria == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->certificado_procuraduria == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Certificado Institución del Orden </td>
                                                <td>
                                                    @if ($data->certificado_institucion == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->certificado_institucion == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-center">Investigación y depuración de
                                                    actividades contrarias a las leyes</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Investigación profunda de vínculos con actividad antisocial</td>
                                                <td>
                                                    @if ($data->actividad_antisocial == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->actividad_antisocial == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Reporte de actividades no procesada</td>
                                                <td>
                                                    @if ($data->reporte_actividad_noprocesada == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->reporte_actividad_noprocesada == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-center">Analística y psicometría</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Prueba Poligráfica</td>
                                                <td>
                                                    @if ($data->prueba_poligrafica == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->prueba_poligrafica == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Prueba Psicométrica</td>
                                                <td>
                                                    @if ($data->prueba_psicometrica == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->prueba_psicometrica == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>Prueba Enfermedades contagiosas</td>
                                                <td>
                                                    @if ($data->enfermedades_contagiosas == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->enfermedades_contagiosas == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Prueba abuso consumo alcohol</td>
                                                <td>
                                                    @if ($data->consumo_alcohol == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->consumo_alcohol == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td>Consumo de sustancia prohibida</td>
                                                <td>
                                                    @if ($data->sustancia_prohibida == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->sustancia_prohibida == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-center">Levantamiento de campo</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td>Visita Domiciliaria</td>
                                                <td>
                                                    @if ($data->visita_domiciliaria == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->visita_domiciliaria == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">11</th>
                                                <td>Levantamiento coordenado</td>
                                                <td>
                                                    @if ($data->levantamiento_coordinado == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->levantamiento_coordinado == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">12</th>
                                                <td>Investigación de entorno</td>
                                                <td>
                                                    @if ($data->investigacion_entorno == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->investigacion_entorno == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">13</th>
                                                <td>Levantamiento de Dactilares</td>
                                                <td>
                                                    @if ($data->levantamiento_dactilar == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->levantamiento_dactilar == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">14</th>
                                                <td>Levantamientos de características fotográfica</td>
                                                <td>
                                                    @if ($data->levantamiento_fotografia == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->levantamiento_fotografia == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">15</th>
                                                <td>Levantamiento de integridad familiar</td>
                                                <td>
                                                    @if ($data->integridad_familiar == 'Si')
                                                    <label class="form-label text-uppercase">Si</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($data->integridad_familiar == 'No')
                                                    <label class="form-label text-uppercase">No</label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-center">Resultado</th>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <p class="text-lowercase">{{ $data->resultado }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-center">Detalles</th>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <p class="text-lowercase">{{ $data->detalle }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
