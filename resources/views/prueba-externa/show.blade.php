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
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Empresa</th>
                                                <th scope="col">Sucursal</th>
                                                <th scope="col">Autorizado</th>
                                                <th scope="col">Correo de Autorizado</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-uppercase">
                                            <tr>
                                                <td>{{ $data->fecha }}</td>
                                                <td>{{ $data->empresa }}</td>
                                                <td>{{ $data->sucursal }}</td>
                                                <td>{{ $data->autorizado }}</td>
                                                <td>{{ $data->correo_autorizado }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12 ">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th scope="col" width="2%">#</th>
                                                <th scope="col" width="30%">Tipo de Prueba</th>
                                                <th scope="col"  width="10%">Respuesta</th>
                                                <th scope="col" width="10%">Código</th>
                                                <th scope="col">Detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-uppercase">
                                            <tr>
                                                <th colspan="5">Certificado de integridad laboral y
                                                    depuraciones</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Certificado de la Procuraduría <br></td>
                                                <td class="text-center"><label class="form-label text-uppercase ">{{ $data->certificado_procuraduria }}</label></td>
                                                <td>{{ $data->code_pro }}</td>
                                                <td>{{ $data->detalle_pro }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Certificado Institución del Orden </td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->certificado_institucion }}</label></td>
                                                <td>{{ $data->code_ins }}</td>
                                                <td>{{ $data->detalle_ins }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="5">Investigación y depuración de
                                                    actividades contrarias a las leyes</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Investigación profunda de vínculos con actividad antisocial</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->actividad_antisocial }}</label></td>
                                                <td>{{ $data->code_ant }}</td>
                                                <td>{{ $data->detalle_ant }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Reporte de actividades no procesada</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->reporte_actividad_noprocesada }}</label></td>
                                                <td>{{ $data->code_nopro }}</td>
                                                <td>{{ $data->detalle_nopro }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="5">Analística y psicometría</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Prueba Poligráfica</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->prueba_poligrafica }}</label></td>
                                                <td>{{ $data->code_pol }}</td>
                                                <td>{{ $data->detalle_pol }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Prueba Psicométrica</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->prueba_psicometrica }}</label></td>
                                                <td>{{ $data->code_psi }}</td>
                                                <td>{{ $data->detalle_psi }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>Prueba Enfermedades contagiosas</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->enfermedades_contagiosas }}</label></td>
                                                <td>{{ $data->code_cont }}</td>
                                                <td>{{ $data->detalle_cont }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Prueba abuso consumo alcohol</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->consumo_alcohol }}</label></td>
                                                <td>{{ $data->code_alc }}</td>
                                                <td>{{ $data->detalle_alc }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td>Consumo de sustancia prohibida</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->sustancia_prohibida }}</label></td>
                                                <td>{{ $data->code_proh }}</td>
                                                <td>{{ $data->detalle_proh }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="5">Levantamiento de campo</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td>Visita Domiciliaria</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->visita_domiciliaria }}</label></td>
                                                <td>{{ $data->code_dom }}</td>
                                                <td>{{ $data->detalle_dom }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">11</th>
                                                <td>Levantamiento coordenado</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->levantamiento_coordinado }}</label></td>
                                                <td>{{ $data->code_coo }}</td>
                                                <td>{{ $data->detalle_coo }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">12</th>
                                                <td>Investigación de entorno</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->investigacion_entorno }}</label></td>
                                                <td>{{ $data->code_ent }}</td>
                                                <td>{{ $data->detalle_ent }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">13</th>
                                                <td>Levantamiento de Dactilares</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->levantamiento_dactilar }}</label></td>
                                                <td>{{ $data->code_dac }}</td>
                                                <td>{{ $data->detalle_dac }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">14</th>
                                                <td>Levantamientos de características fotográfica</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->levantamiento_fotografia }}</label></td>
                                                <td>{{ $data->code_fot }}</td>
                                                <td>{{ $data->detalle_fot }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">15</th>
                                                <td>Levantamiento de integridad familiar</td>
                                                <td class="text-center"><label class="form-label text-uppercase">{{ $data->integridad_familiar }}</label></td>
                                                <td>{{ $data->code_fam }}</td>
                                                <td>{{ $data->detalle_fam }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="5">Resultado</th>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <p class="text-lowercase">{{ $data->detalle_final }}</p>
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
